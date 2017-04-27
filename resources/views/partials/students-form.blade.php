{!! csrf_field() !!}
<div class="form-group">
    <label for="first_name">First name</label>
    <input
        type="text"
        id="first_name"
        name="first_name"
        class="form-control"
        @if(isset($student->first_name))
            value="{{ $student->first_name }}"
        @else
            value="{{ old('first_name')}}"
        @endif
    >
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input
        type="text"
        id="description"
        name="description"
        class="form-control"
        @if(isset($student->description))
            value="{{ $student->description }}"
        @else
            value="{{ old('description') }}"
        @endif
    >
</div>
<div class="form-group">
    <label for="subscribed">
        Subscribe to newsletter
        <input
            type="checkbox"
            id="subscribed"
            name="subscribed"
            @if(isset($student->subscribed)) 
                {{ $student->subscribed === 1 ? 'checked' : ''}}
            @else 
                {{ old('subscribed') === 'on' ? 'checked' : '' }}
            @endif
            
        >
    </label>
</div>
<div class="form-group">
    <label for="school_name">School name</label>
    <input
        type="text"
        id="school_name"
        name="school_name"
        class="form-control"
        @if(isset($student->school_name)) 
            value="{{ $student->school_name }}"
        @else
            value="{{ old('school_name') }}"
        @endif
    >
</div>
