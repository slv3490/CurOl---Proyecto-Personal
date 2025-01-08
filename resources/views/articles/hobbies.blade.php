@extends('layouts.base')

@section('content')
    <div class="contenedor article">
        <div>
            <h1>La Importancia de los Hobbies en la Vida Cotidiana</h1>

            <div class="div-description-title">
                <p>En un mundo cada vez más acelerado, encontrar tiempo para uno mismo puede parecer un lujo. Entre el trabajo, los estudios y las responsabilidades diarias, muchas personas descuidan una parte esencial de su bienestar: los hobbies. Estas actividades, que realizamos por placer y sin una obligación externa, son mucho más que simples pasatiempos; son una fuente de bienestar físico, mental y emocional.</p>
                <div class="image-responsive">
                    <img src="{{ Vite::asset('resources/img/escalation.jpg') }}" alt="Imagen de dos hombres escalando una montaña" title="Imagen de dos hombres escalando una montaña">
                </div>
            </div>
        </div>
        <div>
            <div>
                <h2 class="text-left">¿Qué es un hobby?</h2>
                <p>Un hobby es una actividad que se realiza en el tiempo libre y que proporciona satisfacción personal. Puede ser cualquier cosa que te apasione: desde leer, dibujar, cocinar, hacer ejercicio, hasta actividades más complejas como la jardinería, la programación o la fotografía. Lo que define a un hobby es la motivación interna que impulsa a la persona a dedicarle tiempo y esfuerzo, simplemente porque le gusta.</p>
            </div>
            <img src="{{ Vite::asset('resources/img/playing-videogames.jpg') }}" alt="Imagen persona jugando football con un mando de playstation 5" title="Persona jugando football con un mando de playstation 5">
        </div>
        <div>
            <h2 class="text-left">Beneficios de tener hobbies</h2>
            <ol>
                <li><span class="bold">Reducción del estrés:</span> Dedicar tiempo a un hobby es una forma efectiva de desconectar de las tensiones diarias. Al sumergirse en una actividad que disfruta, la mente se aleja de las preocupaciones y permite al cuerpo relajarse.</li>

                <li><span class="bold">Mejora de la salud mental:</span> Los hobbies fomentan la creatividad y la autoexpresión, lo que puede mejorar el estado de ánimo y reducir los síntomas de la ansiedad y la depresión. También ofrecen un sentido de logro personal, que es clave para mantener una autoestima saludable.</li>

                <li><span class="bold">Desarrollo de habilidades:</span> Muchos hobbies implican aprender nuevas habilidades o perfeccionar las existentes. Esto no solo es gratificante, sino que también mantiene la mente activa y en constante crecimiento.</li>

                <li><span class="bold">Conexiones sociales:</span> Algunos hobbies, como los deportes de equipo o las clases de arte, ofrecen la oportunidad de conocer a otras personas con intereses similares. Estas conexiones pueden ser valiosas para construir amistades y redes de apoyo.</li>

                <li><span class="bold">Equilibrio entre vida laboral y personal:</span> Tener un hobby ayuda a establecer un equilibrio saludable entre el trabajo y el ocio. Es un recordatorio de que la vida no debe girar únicamente en torno a las responsabilidades, sino que también debe incluir momentos de disfrute y descanso.</li>
            </ol>
        </div>

        <div>
            <h2 class="text-left">Cómo encontrar el hobby adecuado</h2>
            <p>Encontrar un hobby que realmente disfrutes puede llevar tiempo y experimentación. Aquí hay algunos consejos para empezar:</p>

            <ol>
                <li><span class="bold">Piensa en lo que te interesa:</span> Reflexiona sobre las actividades que siempre te han llamado la atención o que disfrutabas cuando eras niño. A veces, retomar algo que solías amar puede ser la clave para encontrar un nuevo hobby.</li>

                <li><span class="bold">Explora nuevas actividades:</span> No tengas miedo de probar cosas nuevas. Participar en talleres, clases o grupos relacionados con actividades que nunca has intentado puede llevarte a descubrir pasatiempos inesperados.</li>

                <li><span class="bold">Incorpora lo que te apasiona:</span> Si te gusta la naturaleza, tal vez el senderismo o la jardinería sean hobbies adecuados para ti. Si disfrutas de la tecnología, la programación o la edición de videos pueden ser opciones emocionantes.</li>

                <li><span class="bold">Hazlo parte de tu rutina:</span> Una vez que encuentres un hobby que te guste, intenta incorporarlo a tu vida diaria o semanal. No tiene que ser algo que hagas todos los días, pero dedicarle tiempo regularmente te permitirá disfrutar de sus beneficios.</li>
            </ol>
        </div>

        <div>
            <h2 class="text-left">Conclusión</h2>
            <p>Los hobbies son mucho más que un simple pasatiempo; son una parte fundamental de una vida equilibrada y plena. Nos ofrecen la oportunidad de explorar nuestras pasiones, desarrollar nuevas habilidades, reducir el estrés y conectar con otros. En un mundo donde el tiempo parece escaso, invertir en un hobby es invertir en uno mismo. Así que, si aún no tienes un hobby, ¡es hora de encontrar uno que te haga feliz!</p>
        </div>
    </div>
@endsection