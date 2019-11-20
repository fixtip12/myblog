<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Posts</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="container">
    <h1>Blog Posts</h1>
    <ul>
      @forelse ($posts as $post)
      <li><a href="">{{ $post->title }}</a></li>
      @empty
      <li>No Posts</li>
      @endforelse
    </ul>
  </div>
</body>
</html>