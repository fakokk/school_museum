@extends('layouts.app')
@section('content')
<div>
    @include('layouts.header') <!-- Включить шаблон заголовка -->
</div>

<main class="app-main"> <!-- Центрирование как по горизонтали, так и по вертикали -->

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="section-overlay"></div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <h2 class="text-white">Историко-краеведческий музеи им. Тимофеева Ю.П.</h2>
                    <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                        <span>Добро</span>
                        <span class="cd-words-wrapper" style="width: 161px;">
                            <b class="is-visible">
                                пожаловать!
                            </b>
                            <b class="is-hidden">пожаловать!</b>
                        </span>
                    </h1>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="ratio ratio-16x9">
                    <iframe width="560" height="315" src="//ok.ru/videoembed/6292160449220?nochat=1" frameborder="0" allow="autoplay" allowfullscreen></iframe>    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </section>    

    <div>
        <h3>Справочная информация:</h3>
        <ul>
            <li>Юридический адрес: Забайкальский край, Кыринский район, с. Верхний Ульхун, ул. Школьная 1, МБОУ «Верхне-Ульхунская СОШ».</li>
            <li>Год образования: 1962 (старейший школьный музей на территории Забайкальского края).</li>
            <li>Номер в реестре школьных музеев Российской Федерации: 5286</li>
            <li>Площадь: 84 кв.м.: два помещения 48 и 36 кв.м.</li>
            <li>Координирующий орган: Совет музея – 6 человек.</li>
            <li>Количество экспонатов: около 9000 (материальных – 5500, документальных – 3500).</li>
            <li>Количество постоянных экспозиций: 10</li>
        </ul>
    </div>

        <div class="container">
        <div class="carousel">
            <input type="radio" name="slides" checked="checked" id="slide-1">
            <input type="radio" name="slides" id="slide-2">
            <input type="radio" name="slides" id="slide-3">
            <input type="radio" name="slides" id="slide-4">
            <input type="radio" name="slides" id="slide-5">
            <input type="radio" name="slides" id="slide-6">
            
            <ul class="carousel__slides">
                <li class="carousel__slide">
                    <figure>
                        <img src="{{ asset('storage/images/banner1.jfif') }}" alt="">
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <img src="{{ asset('storage/images/banner2.png') }}" alt="">
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <img src="{{ asset('storage/images/banner3.jfif') }}" alt="">
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <img src="https://picsum.photos/id/1045/800/450" alt="">    
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <img src="https://picsum.photos/id/1049/800/450" alt="">
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <img src="https://picsum.photos/id/1052/800/450" alt="">
                    </figure>
                </li>
            </ul>    
            <ul class="carousel__thumbnails">
                <li>
                    <label for="slide-1" onclick="event.preventDefault(); document.getElementById('slide-1').checked = true;">
                        <img src="{{ asset('storage/images/banner1.jfif') }}" alt="">
                    </label>
                </li>
                <li>
                    <label for="slide-2" onclick="event.preventDefault(); document.getElementById('slide-2').checked = true;">
                        <img src="{{ asset('storage/images/banner2.png') }}" alt="">
                    </label>
                </li>
                <li>
                    <label for="slide-3" onclick="event.preventDefault(); document.getElementById('slide-3').checked = true;">
                        <img src="{{ asset('storage/images/banner3.jfif') }}" alt="">
                    </label>
                </li>
                <li>
                    <label for="slide-4" onclick="event.preventDefault(); document.getElementById('slide-4').checked = true;">
                        <img src="https://picsum.photos/id/1045/150/150" alt="">
                    </label>
                </li>
                <li>
                    <label for="slide-5" onclick="event.preventDefault(); document.getElementById('slide-5').checked = true;">
                        <img src="https://picsum.photos/id/1049/150/150" alt="">
                    </label>
                </li>
                <li>
                    <label for="slide-6" onclick="event.preventDefault(); document.getElementById('slide-6').checked = true;">
                        <img src="https://picsum.photos/id/1052/150/150" alt="">
                    </label>
                </li>
            </ul>

        </div>
    </div>

</main>

<script>               

</script>

<style>
    .app-main {
    }

    section {
        background: #F4F4F4;
        padding: 50px 0;
    }

    .container {
        max-width: 1044px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .carousel {
        display: block;
        text-align: left;
        position: relative;
        margin-bottom: 22px;
    }

    .carousel__slides {
        position: relative;
        z-index: 1;
        padding: 0;
        margin: 0;
        overflow: hidden;
        white-space: nowrap;
        box-sizing: border-box;
        display: flex;
    }

    .carousel__slide {
        position: relative;
        display: block;
        flex: 1 0 100%;
        width: 450px;
        height: auto; /* Fixed height for uniformity */
        overflow: hidden;
    }

    .carousel__slide img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Ensures images are not cropped */
    }

    .carousel__thumbnails {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-top: 20px;
    }

    .carousel__thumbnails li {
        flex: 1;
        max-width: calc((100% / 6) - 20px);
        margin: 0 10px;
    }

    .carousel__thumbnails img {
        width: 100%;
        height: auto; /* Maintain aspect ratio for thumbnails */
        object-fit: cover;
    }

    /* Additional styles from the second block */
    .carousel > input {
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        width: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
    }

    .carousel > input:nth-of-type(6):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -500%; }
    .carousel > input:nth-of-type(5):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -400%; }
    .carousel > input:nth-of-type(4):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -300%; }
    .carousel > input:nth-of-type(3):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -200%; }
    .carousel > input:nth-of-type(2):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -100%; }
    .carousel > input:nth-of-type(1):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: 0%; }

    .carousel > input:nth-of-type(1):checked ~ .carousel__thumbnails li:nth-of-type(1) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
    .carousel > input:nth-of-type(2):checked ~ .carousel__thumbnails li:nth-of-type(2) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
    .carousel > input:nth-of-type(3):checked ~ .carousel__thumbnails li:nth-of-type(3) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
    .carousel > input:nth-of-type(4):checked ~ .carousel__thumbnails li:nth-of-type(4) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
    .carousel > input:nth-of-type(5):checked ~ .carousel__thumbnails li:nth-of-type(5) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
    .carousel > input:nth-of-type(6):checked ~ .carousel__thumbnails li:nth-of-type(6) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }

/*---------------------------------------
  TYPOGRAPHY               
-----------------------------------------*/

h2,
h3,
h4,
h5,
h6 {
  color: var(--dark-color);
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: var(--font-weight-medium);
  letter-spacing: -1px;
}

h1 {
  font-size: var(--h1-font-size);
  font-weight: var(--font-weight-bold);
}

h2 {
  font-size: var(--h2-font-size);
  font-weight: var(--font-weight-bold);
}

h3 {
  font-size: var(--h3-font-size);
}

h4 {
  font-size: var(--h4-font-size);
}

h5 {
  font-size: var(--h5-font-size);
}

h6 {
  font-size: var(--h6-font-size);
}

p {
  color: var(--p-color);
  font-size: var(--p-font-size);
  font-weight: var(--font-weight-normal);
}

ul li {
  color: var(--p-color);
  font-size: var(--p-font-size);
  font-weight: var(--font-weight-normal);
}

a, 
button {
  touch-action: manipulation;
  transition: all 0.3s;
}

a {
  display: inline-block;
  color: var(--secondary-color);
  text-decoration: none;
}

a:hover {
  color: var(--link-hover-color);
}

b,
strong {
  font-weight: var(--font-weight-bold);
}

</style>


@endsection
