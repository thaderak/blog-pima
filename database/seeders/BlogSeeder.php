<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesData = [
            [
                'name' => 'Descanso y Bienestar',
                'slug' => 'descanso-y-bienestar',
                'description' => 'Higiene del sueño, ergonomía sensorial y cómo un confort textil excepcional renueva tu vitalidad.',
                'icon' => 'moon',
                'order' => 1,
            ],
            [
                'name' => 'Textiles y Fibras',
                'slug' => 'textiles-y-fibras',
                'description' => 'La ciencia, la historia y la artesanía del 100% algodón Pima peruano de fibra extra larga.',
                'icon' => 'sparkles',
                'order' => 2,
            ],
            [
                'name' => 'Decoración y Hogar',
                'slug' => 'decoracion-y-hogar',
                'description' => 'Inspiración estética, diseño editorial de interiores y paletas orgánicas para un hogar en calma.',
                'icon' => 'home',
                'order' => 3,
            ],
            [
                'name' => 'Guías y Cuidados',
                'slug' => 'guias-y-cuidados',
                'description' => 'Técnicas profesionales de lavado, secado y conservación para una caricia que perdura por años.',
                'icon' => 'feather',
                'order' => 4,
            ],
            [
                'name' => 'Estilo de Vida',
                'slug' => 'estilo-de-vida',
                'description' => 'Rituales de autocuidado, momentos de pausa y la celebración de los pequeños lujos del día a día.',
                'icon' => 'sun',
                'order' => 5,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $data) {
            $categories[$data['slug']] = Category::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }

        $postsData = [
            [
                'category_slug' => 'descanso-y-bienestar',
                'title' => 'El Santuario del Descanso: Cómo transformar tu dormitorio en un templo de serenidad',
                'slug' => 'santuario-del-descanso-como-transformar-dormitorio',
                'excerpt' => 'El descanso reparador no es una casualidad; es una atmósfera minuciosamente orquestada. Descubre cómo la armonía entre la luz tenue, la acústica serena y la pureza del algodón Pima crean el entorno perfecto para desconectar del mundo exterior.',
                'image' => '/images/blog/hero-editorial.jpg',
                'image_caption' => 'Dormitorio principal con sábanas Peru Pima 600 hilos satén blanco y luz indirecta matutina.',
                'author_name' => 'Camila Valdivia',
                'author_role' => 'Directora de Interiorismo & Bienestar',
                'author_avatar' => 'CV',
                'reading_time' => 6,
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(1),
                'views_count' => 1420,
                'meta_title' => 'El Santuario del Descanso | Blog Peru Pima',
                'meta_description' => 'Aprende a transformar tu dormitorio en un espacio de paz y relajación profunda con textiles de algodón Pima.',
                'content' => '
<p class="lead">Pasamos un tercio de nuestra vida entre sábanas. Sin embargo, con frecuencia subestimamos el impacto transformador que un entorno diseñado para el descanso tiene en nuestra claridad mental, salud física y equilibrio emocional.</p>

<p>Un verdadero santuario de descanso trasciende la simple decoración; se trata de una experiencia multisensorial donde cada elemento responde a un único propósito: invitar al cuerpo y a la mente a soltar las tensiones del día y entregarse a una serenidad absoluta.</p>

<h2>1. La pureza del blanco cálido y los neutros táctiles</h2>
<p>El color es el primer estímulo que el cerebro procesa al entrar en una habitación. Los tonos estridentes o de alto contraste mantienen activo el sistema nervioso simpático, mientras que las tonalidades inspiradas en la naturaleza —como el blanco marfil, el lino crudo, la arena tibia y el gris perla— emiten señales inequívocas de relajación.</p>

<p>Al vestir la cama con una base monocromática neutra, creamos un lienzo de calma visual. La belleza reside en la sutileza: jugar con texturas que contrasten al tacto más que a la vista, alternando el tacto sedoso de las sábanas de satén con mantas de punto suave o fundas duvet de percal ligero.</p>

<blockquote class="editorial-quote">
    <p>“El lujo contemporáneo no busca impresionar con excesos; busca cobijar con pureza y una caricia que devuelva la calma al final de cada jornada.”</p>
    <cite>— Camila Valdivia, Directora de Interiorismo</cite>
</blockquote>

<h2>2. El peso de la caricia: La fibra de algodón Pima de 600 hilos</h2>
<p>Ningún componente del dormitorio tiene un contacto tan íntimo y prolongado con nosotros como la ropa de cama. Aquí es donde el <strong>algodón Pima peruano</strong> marca una diferencia irremplazable. Sus fibras extralargas (de más de 35 mm de longitud) permiten hilar hebras increíblemente finas, densas y uniformes sin recurrir a aditivos artificiales.</p>

<p>El resultado es un tejido transpirable que termorregula la temperatura corporal de manera natural: fresco en las noches templadas y cálidamente acogedor cuando desciende el mercurio. Deslizarse entre sábanas de 600 hilos satén no es un lujo superficial; es una caricia biológicamente diseñada para facilitar la fase de sueño profundo (REM).</p>

<div class="editorial-highlight-box">
    <h3>Los cuatro pilares para tu santuario nocturno</h3>
    <ul>
        <li><strong>Temperatura controlada:</strong> Mantén el dormitorio entre 18°C y 20°C para sincronizar con el descenso térmico natural del cuerpo.</li>
        <li><strong>Fibras 100% transpirables:</strong> Elige siempre algodón natural certificado que evite la acumulación de humedad y calor sintético.</li>
        <li><strong>Oscuridad y luz circadiana:</strong> Sustituye la luz azul de pantallas por lámparas cálidas menores a 2700K una hora antes de dormir.</li>
        <li><strong>Aroma sutil:</strong> Una brisa de lavanda o eucalipto pulverizada a 30 cm sobre la funda de almohada acondiciona el sistema límbico.</li>
    </ul>
</div>

<h2>3. La arquitectura del orden y el espacio negativo</h2>
<p>En el diseño editorial japonés y escandinavo existe el concepto de <em>ma</em>: el valor del vacío. En el dormitorio, una mesilla de noche despejada con apenas un libro y una pequeña flor fresca aporta más sosiego que una docena de adornos recargados. Despejar el campo visual permite que la mirada descanse y que la cama sea el indiscutible protagonista del espacio.</p>

<p>Tómate unos minutos cada mañana para estirar el embozo de tus sábanas y acomodar las almohadas. Ese gesto de respeto hacia tu refugio diario te recompensará cada noche cuando regreses a tu templo personal de quietud.</p>
',
            ],
            [
                'category_slug' => 'textiles-y-fibras',
                'title' => 'La Nobleza del Algodón Pima: Por qué la fibra peruana es admirada en el mundo',
                'slug' => 'nobleza-del-algodon-pima-peruano-fibra-extra-larga',
                'excerpt' => 'Conocido internacionalmente como la seda de los Andes, el algodón Pima de fibra extra larga (ELS) combina una suavidad extraordinaria con una durabilidad incomparable. Conoce la geografía, el clima y la cosecha que hacen único a este tesoro del norte peruano.',
                'image' => '/images/blog/cotton-boll.jpg',
                'image_caption' => 'Cápsula de algodón Pima cosechada a mano en los valles soleados de Piura.',
                'author_name' => 'Alonso Mendoza',
                'author_role' => 'Maestro Textil & Curador de Fibras',
                'author_avatar' => 'AM',
                'reading_time' => 5,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(3),
                'views_count' => 980,
                'meta_title' => 'La Nobleza del Algodón Pima Peruano | Blog Peru Pima',
                'meta_description' => 'Descubre las propiedades únicas del algodón Pima peruano: fibra extra larga, suavidad y durabilidad legendaria.',
                'content' => '
<p class="lead">En solo tres regiones del planeta convergen las condiciones climáticas idóneas para cultivar algodón de fibra extra larga (ELS). Entre ellas, la costa norte del Perú, especialmente el valle de Piura, ostenta un prestigio ancestral insuperable.</p>

<p>El <em>Gossypium barbadense</em>, variedad botánica del algodón Pima, requiere días ininterrumpidos de sol radiante, humedad marina constante y una tierra fértil regada por las aguas de los Andes. Es en este microclima privilegiado donde la fibra desarrolla una longitud excepcional, alcanzando hasta 42 milímetros por filamento.</p>

<h2>¿Por qué la longitud de la fibra lo cambia todo?</h2>
<p>En la industria textil, la longitud de la fibra es el indicador supremo de calidad. Un algodón convencional de fibra corta requiere empalmar miles de hebras diminutas para formar un hilo; en cada unión se generan asperezas microscópicas que provocan el temido "pilling" o pelotillas con el uso repetido.</p>

<p>En contraste, las fibras extra largas del Pima peruano se entrelazan suavemente formando un hilo continuo, resistente y con un brillo natural que compite con la seda. Al tacto, esto se traduce en una superficie impecablemente lisa que se vuelve aún más suave con cada lavado sucesivo.</p>

<blockquote class="editorial-quote">
    <p>“El algodón convencional se desgasta con el tiempo; el algodón Pima genuino madura con gracia, incrementando su caricia a lo largo de los años.”</p>
    <cite>— Alonso Mendoza, Curador Textil</cite>
</blockquote>

<h2>Cosechado a mano: El respeto por la fibra intacta</h2>
<p>A diferencia de la cosecha mecanizada que rasga la planta y mezcla impurezas de hojas y tallos, el algodón Pima de Peru Pima es cosechado meticulosamente a mano por manos expertas. Este proceso artesanal preserva la pureza inmaculada de la mota blanca y evita el uso de desfoliantes químicos agresivos, conservando el tono natural luminoso y la hipoalergenicidad inherente de la fibra.</p>
',
            ],
            [
                'category_slug' => 'textiles-y-fibras',
                'title' => 'Percal vs. Satén: La guía definitiva para elegir las sábanas de tus sueños',
                'slug' => 'percal-vs-saten-guia-definitiva-sabanas',
                'excerpt' => '¿Prefieres el frescor crujiente y mate del percal o la caída suntuosa y sedosa del satén? Desmitificamos la cantidad de hilos y te ayudamos a descifrar la textura que mejor se adapta a tu temperatura y estilo de vida.',
                'image' => '/images/blog/bed-sheets-white.jpg',
                'image_caption' => 'Juego de sábanas en algodón Pima: estructura percal mate vs satén luminoso.',
                'author_name' => 'Alonso Mendoza',
                'author_role' => 'Maestro Textil & Curador de Fibras',
                'author_avatar' => 'AM',
                'reading_time' => 7,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(5),
                'views_count' => 1250,
                'meta_title' => 'Percal vs Satén: ¿Cuál elegir? | Peru Pima',
                'meta_description' => 'Compara el tejido percal y satén de algodón Pima para elegir el juego de sábanas perfecto.',
                'content' => '
<p class="lead">Existe una confusión recurrente: muchas personas creen que el percal y el satén son materiales distintos. En realidad, ambos están confeccionados con 100% algodón Pima; lo que cambia radicalmente es la técnica de tejido del telar.</p>

<p>Comprender esta diferencia es la llave maestra para acertar en la elección de tu ropa de cama ideal.</p>

<h2>El Tejido Percal: Estructura 1 sobre 1</h2>
<p>El tejido de <strong>percal</strong> sigue un patrón clásico cruzado: un hilo vertical sobre un hilo horizontal de manera alternada y uniforme. Esta trama crea un tejido equilibrado, con acabado mate y una textura reconocible por ser fresca, ligera y ligeramente "crujiente" al moverla, muy similar a la sensación de las sábanas en los hoteles boutique de la costa mediterránea.</p>

<h3>Ideal para:</h3>
<ul>
    <li>Personas que suelen sentir calor durante la noche y valoran la máxima transpirabilidad.</li>
    <li>Climas cálidos, épocas de primavera-verano o dormitorios con buena calefacción.</li>
    <li>Amantes de una estética limpia, relajada y con textura natural contemporánea.</li>
</ul>

<h2>El Tejido Satén: Estructura 4 sobre 1</h2>
<p>El <strong>satén de algodón</strong> utiliza una arquitectura en la que cuatro hilos verticales pasan por encima de un hilo horizontal antes de entrelazarse. Esta disposición concentra una mayor cantidad de hilo en la superficie visible, otorgando un brillo sutil y sofisticado, un tacto aterciopelado y una caída envolvente y voluptuosa.</p>

<h3>Ideal para:</h3>
<ul>
    <li>Quienes adoran deslizarse en una cama con sensación suave y fluida similar a la seda.</li>
    <li>Pieles sensibles que buscan una fricción mínima en el rostro y el cuerpo.</li>
    <li>Climas templados a fríos y dormitorios que buscan un aire editorial de alta elegancia.</li>
</ul>

<div class="editorial-highlight-box">
    <h3>El mito de los hilos infinitos</h3>
    <p>Más hilos no siempre significa mayor calidad. Un juego de 250 a 600 hilos fabricado con auténtico <strong>algodón Pima de fibra extra larga</strong> es infinitamente superior a un juego de "1200 hilos" compuesto por hebras sintéticas o hilos multicabo de baja procedencia. La nobleza de la materia prima siempre prima sobre el número mercadológico.</p>
</div>
',
            ],
            [
                'category_slug' => 'estilo-de-vida',
                'title' => 'Ritual de Spa en Casa: El arte de envolverse en toallas de gramaje superior',
                'slug' => 'ritual-spa-en-casa-toallas-gramaje-superior',
                'excerpt' => 'Convertir tu baño en un remanso de bienestar comienza con texturas que reconfortan la piel al salir del agua. Descubre las claves sensoriales para crear una experiencia de calma, vapor e hidratación personal.',
                'image' => '/images/blog/spa-ritual.jpg',
                'image_caption' => 'Toallas de baño de algodón peinado de alta densidad y sales botánicas de baño.',
                'author_name' => 'Sofía Larrea',
                'author_role' => 'Especialista en Mindfulness & Cuidado Personal',
                'author_avatar' => 'SL',
                'reading_time' => 4,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(7),
                'views_count' => 840,
                'meta_title' => 'Ritual de Spa en Casa con Toallas Premium | Peru Pima',
                'meta_description' => 'Aprende a diseñar una rutina de baño tipo spa con toallas de algodón Pima de alto gramaje.',
                'content' => '
<p class="lead">El ritmo vertiginoso de los días exige pausas conscientes. Un baño tibio no debería ser un simple trámite higiénico, sino un paréntesis reparador donde reconectar con los sentidos.</p>

<p>La culminación de ese instante de quietud no ocurre dentro del agua, sino al salir: cuando el cuerpo caliente entra en contacto con el aire y busca instintivamente un abrazo reconfortante.</p>

<h2>La alquimia del gramaje: Por qué 600 g/m² es el estándar dorado</h2>
<p>El gramaje (GSM o gramos por metro cuadrado) determina la densidad y la capacidad de absorción de una toalla. Una toalla liviana de 350 g/m² suele secar con dificultad y se satura con rapidez. En cambio, una toalla de algodón Pima con 600 a 700 g/m² posee bucles mullidos y absorbentes que retiran la humedad por capilaridad inmediata, sin necesidad de frotar la piel agresivamente.</p>

<blockquote class="editorial-quote">
    <p>“Envolver el cuerpo en una toalla densa y tibia es uno de los gestos de autocuidado más generosos y accesibles que podemos brindarnos cada día.”</p>
    <cite>— Sofía Larrea, Terapeuta Sensorial</cite>
</blockquote>

<h2>3 pasos para transformar tu cuarto de baño</h2>
<ul>
    <li><strong>Calienta tus toallas:</strong> Si no dispones de un toallero eléctrico, colócalas unos minutos antes sobre un radiador o sécalas 3 minutos en secadora antes de entrar a la ducha.</li>
    <li><strong>Aromaterapia botánica:</strong> Cuelga una pequeña rama de eucalipto fresco bajo el rociador del agua tibia para que el vapor libere sus aceites esenciales desfatigantes.</li>
    <li><strong>Batas de piqué o gofrado:</strong> Prolonga la relajación descansando 15 minutos en una bata de algodón antes de vestirte para la jornada.</li>
</ul>
',
            ],
            [
                'category_slug' => 'decoracion-y-hogar',
                'title' => 'Tonos Neutros y Luz Suave: Cómo componer un dormitorio con calidez orgánica',
                'slug' => 'tonos-neutros-luz-suave-dormitorio-calidez-organica',
                'excerpt' => 'Blancos cálidos, arena, arcilla suave y toques de madera natural. Aprende a componer capas textiles para lograr un dormitorio sofisticado, atemporal y profundamente acogedor.',
                'image' => '/images/blog/natural-tones.jpg',
                'image_caption' => 'Armonía de tonalidades arena, latte y blanco perla en un espacio minimalista.',
                'author_name' => 'Camila Valdivia',
                'author_role' => 'Directora de Interiorismo & Bienestar',
                'author_avatar' => 'CV',
                'reading_time' => 5,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(10),
                'views_count' => 1120,
                'meta_title' => 'Tonos Neutros y Decoración Orgánica | Peru Pima',
                'meta_description' => 'Guía de estilo para decorar dormitorios elegantes con colores neutros, lino y algodón Pima.',
                'content' => '
<p class="lead">Existe la creencia errónea de que una paleta neutra es monótona o fría. Sin embargo, en el diseño editorial de interiores contemporáneo, los neutros son los tonos más ricos y matizados cuando se ejecutan con capas de texturas táctiles.</p>

<p>La clave no radica en repetir un mismo color, sino en abrazar una sinfonía de tonos análogos: desde el blanco roto y la tiza hasta el lino tostado, el greige y la terracota desvaída.</p>

<h2>La técnica de las capas editoriales (Layering)</h2>
<p>Para lograr que una cama parezca sacada de una portada de revista sin perder su comodidad hogareña, aplica la regla de las tres capas:</p>

<ol>
    <li><strong>Capa base:</strong> Sábanas bajera y encimera en blanco óptico o perla de 415 a 600 hilos. Esta base garantiza la frescura y la sensación de pulcritud inmaculada.</li>
    <li><strong>Capa de volumen:</strong> Funda duvet con relleno plumón en tonos arena o gris sombra. Dóblala a un tercio hacia los pies de la cama para crear altura y contraste tridimensional.</li>
    <li><strong>Capa de acento:</strong> Una manta o pie de cama de tejido trenzado o gofrado en color arcilla o latte, acompañada de almohadas cuadradas de soporte y fundas decorativas.</li>
</ol>

<div class="editorial-highlight-box">
    <h3>El rol de la luz matizada</h3>
    <p>Evita los focos directos sobre el cabecero de la cama. Opta por pantallas de lino, cerámica o papel washi que filtren la luz de manera difusa, simulando la suavidad del amanecer.</p>
</div>
',
            ],
            [
                'category_slug' => 'guias-y-cuidados',
                'title' => 'El Secreto de la Suavidad Eterna: Manual experto para el cuidado de tus sábanas',
                'slug' => 'manual-experto-cuidado-sabanas-algodon-pima',
                'excerpt' => 'Temperaturas de agua, detergentes gentiles y el ritual del secado al aire libre. Todo lo que necesitas saber para prolongar el brillo y la caricia de tus textiles finos por generaciones.',
                'image' => '/images/blog/linen-care.jpg',
                'image_caption' => 'Doblado y almacenamiento de sábanas finas de algodón Pima en ropero de cedro.',
                'author_name' => 'Valeria Rossi',
                'author_role' => 'Conservadora de Textiles Finos',
                'author_avatar' => 'VR',
                'reading_time' => 6,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(14),
                'views_count' => 1560,
                'meta_title' => 'Cómo cuidar tus sábanas de Algodón Pima | Peru Pima',
                'meta_description' => 'Aprende a lavar, secar y planchar sábanas de algodón Pima para mantener su suavidad intacta.',
                'content' => '
<p class="lead">Las sábanas de algodón Pima son una inversión en tu descanso diario. Con los cuidados correctos, no solo mantendrán su textura original, sino que ganarán en tersura y docilidad lavado tras lavado.</p>

<p>A continuación, compartimos las recomendaciones de los maestros tejedores para preservar la integridad de cada fibra.</p>

<h2>1. Lavado: Menos es más</h2>
<p>El mayor enemigo del algodón fino son los agentes químicos agresivos. Los blanqueadores con cloro rompen los filamentos de la fibra, provocando rigidez y desgaste prematuro.</p>

<ul>
    <li><strong>Agua fría o tibia:</strong> Lava siempre a un máximo de 30°C a 40°C. El agua caliente debilita la torsión del hilo y puede encoger el tejido.</li>
    <li><strong>Detergente líquido neutro:</strong> Utiliza fórmulas suaves o ecológicas sin blanqueadores ópticos ni enzimas corrosivas.</li>
    <li><strong>Evita el exceso de suavizante:</strong> Los suavizantes comerciales crean una película grasa sobre la fibra que disminuye su capacidad de absorción y transpiración natural. En su lugar, un chorrito de vinagre blanco en el compartimento de enjuague suaviza y desodoriza de manera impecable.</li>
</ul>

<h2>2. El secado: La brisa como aliada</h2>
<p>Siempre que sea posible, tiende tus sábanas al aire libre a la sombra. El viento alisa naturalmente las arrugas y preserva la humedad microscópica interna que confiere elasticidad al algodón.</p>

<p>Si utilizas secadora eléctrica, selecciona el ciclo para prendas delicadas a baja temperatura y retira las sábanas cuando aún conserven un 5% de humedad. Sacúdelas enérgicamente antes de doblarlas; notarás que el planchado resulta prácticamente innecesario.</p>
',
            ],
            [
                'category_slug' => 'estilo-de-vida',
                'title' => 'La Poesía de las Mañanas Lentas: Pequeños rituales que definen el comienzo del día',
                'slug' => 'poesia-de-las-mananas-lentas-rituales-hogar',
                'excerpt' => 'Despertar entre sábanas de algodón puro, recibir los primeros rayos del sol y saborear una taza caliente sin prisa. Cómo la serenidad de tu amanecer influye en tu productividad y calma emocional.',
                'image' => '/images/blog/morning-routine.jpg',
                'image_caption' => 'Momento de lectura y café matutino entre sábanas frescas de percal blanco.',
                'author_name' => 'Sofía Larrea',
                'author_role' => 'Especialista en Mindfulness & Cuidado Personal',
                'author_avatar' => 'SL',
                'reading_time' => 4,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(18),
                'views_count' => 730,
                'meta_title' => 'La Poesía de las Mañanas Lentas | Peru Pima',
                'meta_description' => 'Rituales de mañana para cultivar paz mental, presencia y disfrute cotidiano en el hogar.',
                'content' => '
<p class="lead">La forma en que transitamos los primeros treinta minutos del día suele determinar la cadencia de las horas siguientes. Cuando despertamos con sobresaltos y alarmas estridentes, el cuerpo se inunda de cortisol; cuando nos permitimos una transición pausada, cultivamos claridad y templanza.</p>

<h2>Quedarse cinco minutos más en el deleite del tacto</h2>
<p>No se trata de postergar la alarma indefinidamente, sino de permanecer despierto en la quietud: sentir la suavidad del tejido sobre la piel, estirar las extremidades lentamente y respirar hondo con la vista posada en el cielo cambiante de la ventana.</p>

<blockquote class="editorial-quote">
    <p>“El verdadero lujo no es poseer cosas; es adueñarse de los propios minutos antes de que el mundo reclame nuestra atención.”</p>
    <cite>— Sofía Larrea</cite>
</blockquote>

<p>Incorporar una bata suave de algodón Pima nada más poner los pies en el suelo crea un puente cálido entre el lecho y el inicio de las tareas. Una infusión tibia, diez páginas de un libro estimulante y unos instantes de silencio bastan para transformar cualquier mañana común en un ritual sagrado.</p>
',
            ],
            [
                'category_slug' => 'decoracion-y-hogar',
                'title' => 'Capas de Confort: Cómo vestir tu cama con duvets y mantas para cada estación',
                'slug' => 'capas-de-confort-vestir-cama-duvets-estaciones',
                'excerpt' => 'El "bed styling" editorial no busca únicamente una fotografía perfecta, sino una experiencia térmica ideal. Aprende la técnica del drapeado escalonado con fundas duvet de 415 y 600 hilos.',
                'image' => '/images/blog/duvet-blanco.jpg',
                'image_caption' => 'Funda duvet en algodón Pima blanco perla con embozo doblado y almohadones.',
                'author_name' => 'Camila Valdivia',
                'author_role' => 'Directora de Interiorismo & Bienestar',
                'author_avatar' => 'CV',
                'reading_time' => 5,
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(22),
                'views_count' => 910,
                'meta_title' => 'Cómo vestir tu cama con duvets y capas | Peru Pima',
                'meta_description' => 'Técnicas de estilismo de camas y elección de fundas duvet para cada época del año.',
                'content' => '
<p class="lead">Una cama bien vestida invita a reposar con solo mirarla. El secreto de los mejores hoteles de lujo radica en la modularidad: un sistema de capas que se ajusta a las oscilaciones térmicas de la noche sin sacrificar la elegancia visual.</p>

<h2>El duvet como pieza central</h2>
<p>La funda duvet es la protagonista indiscutible del dormitorio. Al estar en contacto directo con el durmiente o sobre la sábana encimera, su confección en 100% algodón Pima garantiza que el relleno de plumón o microfibra transpire sin sobrecalentarse.</p>

<p>Para conseguir ese volumen mullido y apetecible que caracteriza a las revistas de diseño, un truco profesional consiste en utilizar un relleno duvet que sea entre 5 y 10 centímetros más amplio que la funda, o doblar el tercio superior sobre sí mismo para duplicar la percepción de densidad y opulencia.</p>
',
            ],
        ];

        foreach ($postsData as $post) {
            $catSlug = $post['category_slug'];
            unset($post['category_slug']);
            $post['category_id'] = $categories[$catSlug]->id;

            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
