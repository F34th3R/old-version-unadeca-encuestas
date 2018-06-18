<?php

use App\Poll;
use Illuminate\Database\Seeder;

class PollsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Poll::create([
            'titles_id' => '1',
            'titleDescription' => 'Instrucciones',
            'description' => 'Lea con cuidado cada una de las declaraciones y seleccione la opción que mejor exprese su opinión acerca de su desempeño docente. La información recabada en esta evaluación servirá para mejorar la calidad del proceso de enseñanza y aprendizaje en la Universidad e incrementar la satisfacción de los estudiantes.',
            'instruction' => 'Lea con cuidado cada una de las declaraciones y seleccione, según la escala, la opción que mejor exprese su opinión acerca de su desempeño docente. Considere que 1 es el puntaje más bajo y 5, el más alto.',
            'quarters_id' => '1',
            
            'isTemplate' => 'true',
        ]);
        Poll::create([
            'titles_id' => '2',
            'titleDescription' => 'Estimado docente',
            'description' => 'Este instrumento recoge sus opiniones acerca del proceso enseñanza-aprendizaje de la clase de su colega. La información ya procesada será compartida con las instancias académicas correspondientes, para programar estrategias de superación y excelencia académica. Gracias por dedicar su valioso tiempo para llenar este instrumento con la mayor precisión posible.',
            'instruction' => 'Instrucciones: Marque la opción que mejor exprese su opinión acerca del desempeño del docente. Considere que 1 es el puntaje más bajo y 5, el más alto.',
            'quarters_id' => '2',
            
            'isTemplate' => 'true',
        ]);
        Poll::create([
            'titles_id' => '3',
            'titleDescription' => 'Estimado(a) director(a) de facultad o coordinador de carrera',
            'description' => 'El propósito de este instrumento es evaluar el desempeño de cada docente en los siguientes aspectos: el aporte como colega, su tarea como tutor, mentor y modelo, como agente de extensión de servicios y como generador de conocimiento.',
            'instruction' => 'Considere que 1 es el puntaje más bajo y 5, el más alto.',
            'quarters_id' => '3',
            
            'isTemplate' => 'true',
        ]);
        Poll::create([
            'titles_id' => '4',
            'titleDescription' => 'Estimado(a) director(a) de facultad o coordinador de carrera',
            'description' => 'El propósito de este instrumento es evaluar el desempeño de cada docente en los siguientes aspectos: el aporte como colega, su tarea como tutor, mentor y modelo, como agente de extensión de servicios y como generador de conocimiento. ',
            'instruction' => 'Considere que 1 es el puntaje más bajo y 5, el más alto.',
            'quarters_id' => '1',
            
            'isTemplate' => 'true',
        ]);
        Poll::create([
            'titles_id' => '5',
            'titleDescription' => 'Instrucciones',
            'description' => 'Este cuestionario tiene como propósito que los docentes y administradores de tu carrera conozcan tu grado de satisfacción con la enseñanza que se te ofrece. Evalúa la materia que estás cursando.',
            'instruction' => 'Para lograr nuestro propósito, por favor, evalúa TODOS los aspectos siguientes. Considera que 1 es el puntaje más bajo y 5, el más alto.',
            'quarters_id' => '1',
            
            'isTemplate' => 'true',
        ]);

    }
}
