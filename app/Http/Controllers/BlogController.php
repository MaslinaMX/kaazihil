<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Obtiene todos los posts del blog
     */
    public function index()
    {
        $posts = $this->getAllPosts();
        return view('blog', compact('posts'));
    }

    /**
     * Muestra el detalle de un post específico
     */
    public function show($slug)
    {
        $post = $this->getPostBySlug($slug);
        
        if (!$post) {
            abort(404);
        }

        return view('blog-details', compact('post'));
    }

    /**
     * Obtiene todos los posts del JSON
     */
    private function getAllPosts()
    {
        $postsPath = resource_path('blog/posts.json');
        
        if (!File::exists($postsPath)) {
            return [];
        }

        $posts = json_decode(File::get($postsPath), true);
        
        // Ordenar por fecha descendente
        usort($posts, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return $posts;
    }

    /**
     * Obtiene un post específico por slug
     */
    private function getPostBySlug($slug)
    {
        $posts = $this->getAllPosts();
        $post = collect($posts)->firstWhere('slug', $slug);

        if ($post && File::exists(resource_path("blog/posts/{$slug}.md"))) {
            $post['content'] = File::get(resource_path("blog/posts/{$slug}.md"));
            // Convertir Markdown a HTML básico
            $post['content'] = $this->markdownToHtml($post['content']);
        }

        return $post;
    }

    /**
     * Convierte Markdown básico a HTML
     */
    private function markdownToHtml($markdown)
    {
        $html = $markdown;

        // Encabezados
        $html = preg_replace('/^### (.*?)$/m', '<h3>$1</h3>', $html);
        $html = preg_replace('/^## (.*?)$/m', '<h2>$1</h2>', $html);
        $html = preg_replace('/^# (.*?)$/m', '<h1>$1</h1>', $html);

        // Bold y Italic
        $html = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $html);
        $html = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $html);

        // Listas
        $html = preg_replace('/^\- (.*?)$/m', '<li>$1</li>', $html);
        $html = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $html);

        // Párrafos
        $html = preg_replace('/\n\n/', '</p><p>', $html);
        $html = '<p>' . trim($html) . '</p>';

        // Limpiar párrafos vacíos
        $html = preg_replace('/<p><\/p>/', '', $html);

        return $html;
    }
}
