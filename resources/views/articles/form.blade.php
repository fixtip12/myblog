{{ csrf_field() }}
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ old('title',$article->title ?? '') }}">
</div>
<div class="form-group">
  <article-tags-input
  >
  </article-tags-input>
</div>
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ old('body',$article->body ?? '') }}</textarea>
</div>