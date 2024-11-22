<x-layout>
    MAak hier uw afspraken.

    <form action="">
        @csrf
        <div class="form-group">    
            <label for="name">Naam Afspraak</label>
            <input type="text" class="form-control" id="name" name="name"></input>

        </div>
    </form>
</x-layout>