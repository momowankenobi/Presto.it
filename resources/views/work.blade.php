<x-layout>
    <x-slot name="title">Lavora con noi</x-slot>
    <x-slot name="style">
        <style>
            body{
                background-color: #23395B !important;
            }
            #footer{
                /* position: absolute;
                bottom: 0; */
            }
            .formWork{
                background: #fff;
                border-radius: 30px;
            }
        </style>
    </x-slot>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 formWork col-md-8 mb-5 mt-5 p-5">
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <img class="img-fluid" src="/img/work.png" alt="">
                    </div>
                    <div class="col-6">
                        <h1 class="display-4">We want you!</h1>
                        <br>
                        <h4>Perchè sceglierci?</h4>
                        <br>
                        <p class="text-muted">Ci piace essere smart e poter scegliere il posto migliore da cui connetterci e lavorare!</p>
                    </div>
                </div>
                <form class="" action="" method="post">
                    <div class="form mb-3">
                        <label class="form-label">Parlaci un pò di te</label>
                        <textarea class="form-control" name="message" placeholder="Scrivi il tuo messaggio" rows="5">
                            {{old('description')}} 
                        </textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn text-light rounded-pill bg-night">Invia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>