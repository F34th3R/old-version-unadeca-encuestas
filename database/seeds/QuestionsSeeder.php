<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // OPINIÓN ESTUDIANTIL DE LA ACTIVIDAD DOCENTE
        //1
        Question::create([
            'question' => 'El profesor fomenta un ambiente adecuado de aprendizaje, respeto y tolerancia.'
        ]);
        //2
        Question::create([
            'question' => 'Desarrollo del contenido de la materia.'
        ]);
        //3
        Question::create([
            'question' => 'Calidad del contenido (claro, actualizado, útil).'
        ]);
        //4
        Question::create([
            'question' => 'Calidad de las actividades en la clase.'
        ]);
        //5
        Question::create([
            'question' => 'Motivación recibida por parte del docente, para cumplir con las actividades del curso.'
        ]);
        //6
        Question::create([
            'question' => 'Cumplimiento de los temas de la materia de acuerdo al prontuario.'
        ]);
        //7
        Question::create([
            'question' => 'Dominio que el profesor tiene de la materia. '
        ]);
        //8
        Question::create([
            'question' => 'Integración de los principios de la fe y/o valores cristianos dentro de la clase o en otras actividades.'
        ]);
        //9
        Question::create([
            'question' => 'Estímulo del profesor para desarrollar un pensamiento analítico.'
        ]);
        //10
        Question::create([
            'question' => 'Oportunidades para expresar tus opiniones.'
        ]);
        //11
        Question::create([
            'question' => 'Disponibilidad del profesor para atender tus dudas e inquietudes.'
        ]);
        //12
        Question::create([
            'question' => 'El profesor se apega al sistema de evaluación descrito en el prontuario.'
        ]);
        //13
        Question::create([
            'question' => 'Trato respetuoso del profesor dentro y fuera del salón de clase.'
        ]);
        //14
        Question::create([
            'question' => 'Puntualidad del profesor al iniciar y finalizar la clase.'
        ]);
        //15
        Question::create([
            'question' => 'Productividad y aprovechamiento del tiempo de clase.'
        ]);
        //16
        Question::create([
            'question' => 'Uso de diversos recursos y medios audiovisuales en el desarrollo de las clases.'
        ]);
        //17
        Question::create([
            'question' => 'Utilización de la plataforma “Moodle”.'
        ]);
        //18
        Question::create([
            'question' => 'El profesor publica oportunamente el prontuario en la plataforma "Moodle".'
        ]);
        //19
        Question::create([
            'question' => 'Control del orden y la disciplina en clase.'
        ]);
        //20
        Question::create([
            'question' => 'Presentación personal del docente.'
        ]);
        //21
        Question::create([
            'question' => 'Registro de calificaciones actualizado.'
        ]);
        //22
        Question::create([
            'question' => 'El profesor implementa métodos de enseñanza diferentes y actualizados.'
        ]);
        //23
        Question::create([
            'question' => 'Promueve los valores institucionales entre los estudiantes.'
        ]);
        //24
        Question::create([
            'question' => 'Propicia un ambiente espiritual (oración, reflexión) dentro y fuera del aula.'
        ]);
        //25
        Question::create([
            'question' => 'En general, la evaluación del curso es:'
        ]);

//        Evaluación de la actividad docente por parte de los directores de escuela profesor contrato
        //26
        Question::create([
            'question' => 'Entrega el prontuario a tiempo al director o coordinador.'
        ]);
        //27
        Question::create([
            'question' => 'Publica oportunamente el prontuario en la plataforma "Moodle".'
        ]);
        //28
        Question::create([
            'question' => 'Cumple con los contenidos contemplados en el prontuario.'
        ]);
        //29
        Question::create([
            'question' => 'Registro de la asistencia a clases.'
        ]);
        //30
        Question::create([
            'question' => 'Entrega las calificaciones dentro de los 8 días después de aplicada la prueba o entregado el trabajo.'
        ]);
        //31
        Question::create([
            'question' => 'Asiste puntualmente a las clases.'
        ]);
        //32
        Question::create([
            'question' => 'Asiste puntualmente a las juntas y/o reuniones, comisiones, etc., convocadas.'
        ]);
        //33
        Question::create([
            'question' => 'Publica a tiempo el horario de atención a alumnos.'
        ]);
        //34
        Question::create([
            'question' => 'Aplica las adecuaciones curriculares aprobadas.'
        ]);
        //35
        Question::create([
            'question' => 'Refleja la filosofía de la educación adventista en su vida personal y profesional.'
        ]);
        //36
        Question::create([
            'question' => 'Se actualiza en su disciplina profesional.'
        ]);
        //37
        Question::create([
            'question' => 'Se actualiza en docencia.'
        ]);
        //38
        Question::create([
            'question' => 'Se actualiza en filosofía adventista.'
        ]);
        //39
        Question::create([
            'question' => 'Participa en consultorías, empresa escuela, seminarios, conferencias, talleres u otros servicios.'
        ]);
        //40
        Question::create([
            'question' => 'Publica libros, textos, manuales, artículos interna o externamente, investigaciones realizadas, asesorías de tesis y cursos en línea.'
        ]);
        //41
        Question::create([
            'question' => 'Uso que hace de computadora, vídeo proyector, clase en línea, software de presentaciones u otros recursos tecnológicos.'
        ]);
        //42
        Question::create([
            'question' => 'Diseño de diferentes estrategias, para interactuar con los estudiantes en la plataforma "Moodle".'
        ]);
        //43
        Question::create([
            'question' => 'Domina el contenido de la materia.'
        ]);
        //44
        Question::create([
            'question' => 'Control del orden y la disciplina en clase.'
        ]);
        //45
        Question::create([
            'question' => 'Promueve los valores institucionales entre los estudiantes.'
        ]);
        //46
        Question::create([
            'question' => 'Propicia un ambiente espiritual (oración, reflexión) dentro y fuera del aula.'
        ]);
        //47
        Question::create([
            'question' => 'Usa el sistema “Class Web”. '
        ]);
        //48
        Question::create([
            'question' => 'El profesor se apega al sistema de evaluación descrito en el prontuario.'
        ]);

//        Evaluación de la actividad docente por parte de los directores de escuela
        //49
        Question::create([
            'question' => 'Cumple con las actividades programadas de mentoría.'
        ]);
        //50
        Question::create([
            'question' => 'Participa en actividades extracurriculares (semana cívica, actividades espirituales, feria gastronómica, presentación de países, etc.)'
        ]);

//        Evaluación de la actividad docente por parte de los colegas
        //51
        Question::create([
            'question' => 'Dominio del contenido de la materia.',
        ]);
        //52
        Question::create([
            'question' => 'Calidad y pertinencia de los materiales de apoyo utilizados en la clase.',
        ]);
        //53
        Question::create([
            'question' => 'Uso de estrategias de aprendizaje.',
        ]);
        //54
        Question::create([
            'question' => 'Integración de la fe en la enseñanza.',
        ]);
        //55
        Question::create([
            'question' => 'Uso efectivo del tiempo en el aula.',
        ]);
        //56
        Question::create([
            'question' => 'Trato respetuoso hacia los estudiantes.',
        ]);
        //57
        Question::create([
            'question' => 'Participación de los estudiantes durante la clase.',
        ]);
        //58
        Question::create([
            'question' => 'Capacidad para controlar el orden y la disciplina en la clase.',
        ]);
        //59
        Question::create([
            'question' => 'Manera en que el profesor examina los conocimientos previos de los alumnos y luego los asocia con nuevos conocimientos.',
        ]);
        //60
        Question::create([
            'question' => 'Estímulo al desarrollo del pensamiento analítico de los estudiantes.',
        ]);
        //61
        Question::create([
            'question' => 'La presentación personal del docente es acorde con la filosofía y código de vestimenta de la Institución.',
        ]);
        //62
        Question::create([
            'question' => 'Registro de calificaciones actualizado.',
        ]);
        //63
        Question::create([
            'question' => 'Uso de la plataforma “Moodle”.',
        ]);
        //64
        Question::create([
            'question' => 'Ambiente de aprendizaje que el profesor promueve.',
        ]);
        //65
        Question::create([
            'question' => 'Motivación del docente a los estudiantes.',
        ]);
        //66
        Question::create([
            'question' => 'El docente implementa métodos de enseñanza diferentes y actualizados.',
        ]);
        //67
        Question::create([
            'question' => 'Propicia un ambiente espiritual (oración, reflexión) dentro y fuera del aula',
        ]);
        //68
        Question::create([
            'question' => 'Hace uso de la computadora, vídeo proyector, clase en línea, software de presentaciones u otros recursos tecnológicos.',
        ]);

//        Autoevaluación de las actividades docentes
        //69
        Question::create([
            'question' => 'Confecciono y entrego a tiempo el prontuario de clase.',
        ]);
        //70
        Question::create([
            'question' => 'Domino, profundizo y actualizo el contenido de la materia.',
        ]);
        //71
        Question::create([
            'question' => 'Registro la asistencia y las calificaciones de los estudiantes.',
        ]);
        //72
        Question::create([
            'question' => 'Fomento un ambiente adecuado de aprendizaje, respeto y tolerancia.',
        ]);
        //73
        Question::create([
            'question' => 'Desarrollo el contenido de la materia de manera clara y organizada.',
        ]);
        //74
        Question::create([
            'question' => 'Implemento métodos de enseñanza diferentes y actualizados.',
        ]);
        //75
        Question::create([
            'question' => 'Hago uso de recursos y medios audiovisuales variados.',
        ]);
        //76
        Question::create([
            'question' => 'Mantengo el interés y atención del grupo.',
        ]);
        //77
        Question::create([
            'question' => 'Examino y asocio los conocimientos previos de los alumnos.',
        ]);
        //78
        Question::create([
            'question' => 'Integro la filosofía de la educación adventista, dentro y fuera de clase.',
        ]);
        //79
        Question::create([
            'question' => 'Estimulo el desarrollo del pensamiento analítico.',
        ]);
        //80
        Question::create([
            'question' => 'Propicio espacios para que los estudiantes expresen sus opiniones.',
        ]);
        //81
        Question::create([
            'question' => 'Manifiesto disposición para atender a los estudiantes.',
        ]);
        //82
        Question::create([
            'question' => 'Evalúo a los estudiantes de acuerdo al esquema de evaluación establecido en el prontuario.',
        ]);
        //83
        Question::create([
            'question' => 'Inicio y finalizo la clase puntualmente.',
        ]);
        //84
        Question::create([
            'question' => 'Aprovecho adecuadamente el tiempo de la clase.',
        ]);
        //85
        Question::create([
            'question' => 'Controlo la disciplina en el salón de clases.',
        ]);
        //86
        Question::create([
            'question' => 'Mi presentación personal es acorde al código de vestimenta de la Universidad.',
        ]);
        //87
        Question::create([
            'question' => 'Uso la plataforma “Moodle”.',
        ]);
        //88
        Question::create([
            'question' => 'Uso el sistema “Class Web”.',
        ]);
        //89
        Question::create([
            'question' => 'Calidad de mis actividades de clase.',
        ]);
        //90
        Question::create([
            'question' => 'Promuevo los valores institucionales entre los estudiantes.',
        ]);
        //91
        Question::create([
            'question' => 'Propicio un ambiente espiritual (oración, reflexión) dentro y fuera del aula.',
        ]);
        //92
        Question::create([
            'question' => 'He publicado libros, textos, manuales, artículos interna o externamente (a la Institución), (he realizado) investigaciones realizadas, asesorías de tesis y cursos en línea. ',
        ]);
        //93
        Question::create([
            'question' => 'Participo en consultorías, empresa escuela, seminarios, conferencias, talleres u otros servicios.',
        ]);
        //94
        Question::create([
            'question' => 'Me actualizo en mi disciplina profesional.',
        ]);
        //95
        Question::create([
            'question' => 'Publico el prontuario en la plataforma “Moodle”.',
        ]);
        //96
        Question::create([
            'question' => 'Motivo a los estudiantes para cumplir con las actividades del curso.',
        ]);
        //97
        Question::create([
            'question' => 'Aplico las adecuaciones curriculares aprobadas.',
        ]);

    }
}
