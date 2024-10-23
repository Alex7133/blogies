<<<<<<< HEAD
<div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title"
                  name="title"
                  type="text"
                  value="{{ old('title', $post->title) }}"
                  class="block w-full mt-1"
    />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>
<div>
    <x-input-label for="body" :value="__('Body')" />
    <x-textarea id="body"
                name="body"
                class="block w-full mt-1"
    >{{ old('body', $post->body) }}</x-textarea>
    <x-input-error :messages="$errors->get('body')" class="mt-2" />
</div>
=======
<label>
    {{ __('Title') }} <br />
    <input type="text" name="title" value="{{ old('title', $post->title) }}">
    @error('title')
    <br />
    <small style="color: red">{{ $message }}</small>
    @enderror
</label>
<br />
<label>
    {{ __('Body') }} <br />
    <textarea name="body">{{ old('body',$post->body) }}</textarea>
    @error('body')
    <br />
    <small style="color: red">{{ $message }}</small>
    @enderror
</label>
>>>>>>> 4e4b122b329b6bd1c8e09b5759611822b9944003
