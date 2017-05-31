<div class="section">
    <h5 class="sectionTitle">Popularno</h5>
    <hr>
    <div class="col" id="popular_tags">
        <div class="section center-align">
            @forelse($popularTags as $tag)
                <div class="chip chipTag">
                    <a href="{{ route('tag.show', ['tag' => $tag->name]) }}">
                        {{ $tag->name }}
                    </a>
                </div>
            @empty
                <p>Nema tagova još</p>
            @endforelse
        </div>
    </div>
</div>