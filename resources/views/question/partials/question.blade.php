<div class="card-panel z-depth-1 lighten-5">
    <i>
        <i class="tiny material-icons">person_pin</i>
        {{ $question->author()->first()->name }}
        {{ $question->createdForHuman() }}
    </i>
    <blockquote>
        <a href="{{ route('question.single', ['id' => $question->id , 'slug' => $question->slug]) }}">
            {{ $question->title }}
        </a>
    </blockquote>
    <div class="row" id="tags">
        <div class="col s12">
            @foreach( $question->tags as $tag )
                <div class="chip chipTag">
                    <a href="{{ route('tag.show', ['tag' => $tag->name]) }}">
                        {{ $tag->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div id="row">
        <div class="col s12">
            <span> <i class="tiny material-icons">visibility</i> <span>{{ $question->views }}</span></span>
            <span> | {{ count($question->answers) }} Odgovora </span>
        </div>
    </div>
</div>