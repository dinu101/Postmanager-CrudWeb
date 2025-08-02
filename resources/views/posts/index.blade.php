<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-4 sm:p-8">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Posts Manager</h1>
        <a href="{{ route('posts.create') }}" class="w-full sm:w-auto px-6 py-2 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 hover:scale-105 transition duration-300 transform text-center">
            Create New Post
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    @if (count($posts) > 0)
        <div class="grid gap-6">
            @foreach ($posts as $post)
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 hover:shadow-lg transition duration-300">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-600 mb-4 text-sm sm:text-base">{{ Str::limit($post->content, 150) }}</p>
                    <div class="flex flex-wrap space-x-2 sm:space-x-4 mt-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="px-4 py-2 bg-gray-500 text-white font-bold rounded-lg hover:bg-gray-600 transition duration-300 shadow-md hover:scale-105 transform">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="px-4 py-2 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition duration-300 shadow-md hover:scale-105 transform">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition duration-300 shadow-md hover:scale-105 transform" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-center text-lg">No posts found. Create one to get started!</p>
    @endif
</div>

</body>
</html>
