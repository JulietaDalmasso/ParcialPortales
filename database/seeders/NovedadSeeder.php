<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('novedades')->insert([
            [
                'novedad_id'       => 1,
                'titulo'           => 'Tendencias en diseño web para 2025',
                'contenido'        => 'El diseño web evoluciona cada año, y 2025 no es la excepción. El minimalismo seguirá siendo una tendencia fuerte, priorizando la claridad y la experiencia del usuario. Las microanimaciones, por su parte, aportan dinamismo sin sobrecargar las páginas, mejorando la interacción y la retención de los visitantes. Otro aspecto clave es la implementación del dark mode como estándar, ya que cada vez más usuarios prefieren interfaces oscuras por comodidad visual. Además, la accesibilidad y el diseño inclusivo se consolidan como pilares fundamentales, asegurando que todos los usuarios, sin importar sus capacidades, puedan navegar de manera fluida. La personalización mediante tipografías experimentales y paletas de colores audaces también marcará la diferencia entre los proyectos más innovadores. En conclusión, quienes apuesten por un diseño moderno y centrado en el usuario lograrán destacarse en un entorno digital cada vez más competitivo.',
                'descripcion'      => 'Un repaso por los estilos visuales más usados: minimalismo, microanimaciones y dark mode.',
                'imagen'           => 'images/blog/diseno2025.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'novedad_id'       => 2,
                'titulo'           => 'El futuro del e-commerce: inteligencia artificial y personalización',
                'contenido'        => 'El comercio electrónico está atravesando una revolución gracias a la inteligencia artificial. Cada vez más plataformas utilizan algoritmos de recomendación que analizan el comportamiento de compra de los usuarios para mostrar productos personalizados. Esto no solo aumenta las probabilidades de conversión, sino que también mejora la experiencia general del cliente. En 2025, veremos un incremento en el uso de chatbots avanzados que ofrecen atención al cliente 24/7, así como sistemas de análisis predictivo que permiten anticipar tendencias de consumo. La personalización se convierte en la clave: desde la forma en que se presentan los productos hasta la manera en que se comunican las promociones, todo apunta a generar experiencias únicas y adaptadas a cada usuario. El reto para las marcas será integrar estas herramientas sin perder la calidez del trato humano, logrando un equilibrio que inspire confianza y fidelidad en sus clientes.',
                'descripcion'      => 'Cómo las tiendas online están usando IA para recomendar productos y mejorar la experiencia del cliente.',
                'imagen'           => 'images/blog/ecommerceIA.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'novedad_id'       => 3,
                'titulo'           => 'Redes sociales en 2025: nuevas plataformas y cambios de algoritmo',
                'contenido'        => 'Las redes sociales se encuentran en constante transformación, y 2025 trae consigo grandes desafíos para marcas y creadores de contenido. Los cambios en los algoritmos priorizan cada vez más el contenido auténtico, generado por los usuarios, y penalizan el material excesivamente publicitario. Además, surgen nuevas plataformas con enfoques de nicho que captan comunidades específicas, lo que obliga a las marcas a diversificar su presencia digital. La tendencia apunta hacia la creación de experiencias inmersivas con realidad aumentada y transmisiones en vivo más interactivas. Para las empresas, la clave estará en generar contenido de valor que conecte emocionalmente con la audiencia y mantener una estrategia flexible que se adapte rápidamente a los cambios del entorno digital. En definitiva, quienes logren innovar sin perder la autenticidad serán los que consigan construir relaciones duraderas con sus comunidades online.',
                'descripcion'      => 'Qué deben saber las marcas para seguir siendo visibles y relevantes en el ecosistema digital.',
                'imagen'           => 'images/blog/redes2025.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'novedad_id'       => 4,
                'titulo'           => 'Mobile first: la clave para atraer clientes desde el celular',
                'contenido'        => 'En un mundo donde la mayoría de los usuarios navega desde dispositivos móviles, adoptar un enfoque mobile first ya no es una opción, sino una necesidad. Este paradigma implica diseñar primero para pantallas pequeñas y luego escalar hacia dispositivos más grandes, garantizando siempre la mejor experiencia. Un sitio optimizado para móviles debe ser rápido, intuitivo y accesible, con menús simplificados y tiempos de carga mínimos. Además, Google prioriza en sus resultados de búsqueda a las páginas que cumplen con estas condiciones, lo que impacta directamente en la visibilidad de un negocio. Para las marcas, centrarse en mobile first significa no solo atraer clientes, sino también fidelizarlos a través de experiencias adaptadas a su vida cotidiana. En conclusión, aquellas empresas que adopten este enfoque estarán un paso adelante, conectando de manera más efectiva con un público cada vez más móvil y exigente.',
                'descripcion'      => 'Por qué priorizar la experiencia móvil es indispensable para cualquier negocio digital',
                'imagen'           => 'images/blog/mobilefirst.jpg',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'novedad_id'       => 5,
                'titulo'           => 'Marketing de contenidos: cómo generar confianza con tu audiencia',
                'contenido'        => 'El marketing de contenidos se ha consolidado como una de las estrategias más efectivas para conectar con los clientes y generar confianza. En lugar de enfocarse únicamente en vender, esta técnica busca ofrecer información útil, educativa o inspiradora que refuerce la relación con la audiencia. En 2025, los formatos más consumidos incluyen artículos especializados, newsletters personalizadas y podcasts temáticos. El desafío está en mantener la coherencia de la voz de la marca y producir materiales que realmente aporten valor en medio de la saturación digital. Una estrategia bien planificada de marketing de contenidos no solo atrae nuevos clientes, sino que también construye una comunidad fiel alrededor de la marca. Invertir en contenido de calidad es apostar a largo plazo, construyendo una base sólida de confianza y credibilidad que diferencie a la empresa en el mercado',
                'descripcion'      => 'Tips para crear blogs, newsletters y campañas que aporten valor real a los clientes.',
                'imagen'           => 'images/blog/marketing.jpg ',
                'created_at'       => now(),
                'updated_at'       => now()
            ]
        ]);
    }
}
