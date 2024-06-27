<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel='stylesheet' type='text/css' href='{{asset('/assets/css/bootstrap.min.css')}}' >
</head>
<body>

    <div class='mt-5'>
    <div class=' col-md-12 d-flex justify-content-end container '>
     <a class='btn btn-warning' href='{{route('login')}}' >Login</a>
    </div>

    <h3 class='text-uppercase text-center'>Seja bem vindo ao blog de notícias</h3>

        <div class='col-md-12 container  d-flex justify-content-center  flex-wrap align-items-center  mt-5' >
        @for($i=1; $i<=4; $i++)

            <div class='col-md-3 my-2 mx-4 mb-1'>
                <div class='card ' style='width:20rem;'>
                    <div class="p-2">
                        <img src='{{asset('./assets/images/open_source.jpg')}}' class='card-img-top rounded' alt='...' />
                    </div>

                    <div class='card-body'>
                    <div class='card-title'>
                        <h5 class='text-uppercase text-muted'>Título</h5>
                    </div>
                        <div class='text-start' >
                            <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, iure. Qui totam laudantium quasi temporibus quisquam repudiandae distinctio, neque corrupti sint tempora! Laboriosam illum quos explicabo. Non quae aliquid deserunt.
                           </p>
                        </div>


                        <div>

                        <p class='d-flex '>Fonte:

                            <a class='mx-1' href='https://google.com'>clique aqui</a>
                        </p>
                        </div>
                    </div>
                </div>
            </div>

     @endfor
        </div>

    </div>


</body>
</html>
