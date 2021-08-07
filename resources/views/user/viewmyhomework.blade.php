@foreach ($studenthomeworks as $studenthomework)
<div class="pt-10 mb-10">
    <a href="{{ route('student.viewmyhomeworkcorrect', $studenthomework->id) }}"
        class="border-b-2 pb-2 border-dotted italic text-gray-500"
        >see correction &rarr;</a>
</div>
{{ $studenthomework->subject }}
<br>
{{ $studenthomework->name }}
<br>
<iframe width="100%" height="100%" src="/studentassets/{{ $studenthomework->file_path }}"></iframe>
@endforeach