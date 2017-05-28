<div class="card-panel">
    <div class="section" id="questionTitle">
        <h6> {{ $answer->author->name }} {{ $answer->author->lastName }} ,
            <i>Napravia cuda 91</i>
        </h6>
    </div>
    <main id="questionContent">
        <section>
            <p>{{ $answer->body }}</p>
        </section>
    </main>
</div>