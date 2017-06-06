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
                    <a href="{{ route('answer.up', ['id' => $answer->id])}}"
                       class="material-icons">
                        thumb_up
                    </a>
                </div>
                <div id="votes">
                    <span class="votesNumber">{{ $answer->votes }}</span>
                </div>
                <div id="downVote">
                    <a href="{{ route('answer.down', ['id' => $answer->id] )}}"
                       class="material-icons">
                        thumb_down
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="section" id="questionTitle">
                <h6> {{ $answer->author->name }} {{ $answer->author->lastName }} ,
                    <i>Napravia cuda 91</i>
                </h6>
            </div>
        </div>
    </div>
</div>
