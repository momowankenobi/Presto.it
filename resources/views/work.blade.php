<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="my-5" action="" method="post">
                    <div class="form mb-3">
                        <label class="form-label">Scrivi il tuo messaggio</label>
                        <textarea class="form-control" name="message" placeholder="Scrivi il tuo messaggio" rows="5">
                            {{old('description')}} 
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>