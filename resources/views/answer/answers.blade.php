<div class="card-panel">
    <div class="row">
        <div class="col s10">
            <div id="questionContent">
                <section>
                    <p>{{ $answer->body }}</p>
                </section>
            </div>
        </div>
        <div class="col s2 center-align">
            <div class="section">
                <div id="upVote">
                    <a href="{{ route('answer.vote', ['id' => $answer->id, 'action' => 'up'])}}"
                       class="material-icons">thumb_up</a>
                </div>
                <div id="votes">
                    <span class="votesNumber">{{ $answer->votes->sum('vote_value') }}</span>
                </div>
                <div id="downVote">
                    <a href="{{ route('answer.vote', ['id' => $answer->id, 'action' => 'down'] )}}"
                       class="material-icons"> thumb_down</a>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div id="questionTitle">
                <i>{{ $answer->author->name }} {{ $answer->author->lastName }}</i>
            </div>
        </div>
    </div>
</div>
