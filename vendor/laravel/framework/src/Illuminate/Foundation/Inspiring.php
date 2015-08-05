<?php namespace Illuminate\Foundation;

use Illuminate\Support\Collection;

class Inspiring {

	/**
	 * Get an inspiring quote.
	 *
	 * Taylor & Dayle made this commit from Jungfraujoch. (11,333 ft.)
	 *
	 * @return string
	 */
	public static function quote()
	{
		return Collection::make([

			'No teníamos constancia del paso del tiempo, porque el tiempo se había convertido para nosotros en una mera ilusión.',
			'El hombre que conoce la verdad está más allá del bien y del mal. El hombre que conoce la verdad ha comprendido que la ilusión es la realidad única y que la sustancia es la gran impostora',
			'"A mi parecer, no hay nada más misericordioso en el mundo que la incapacidad del cerebro humano de correlacionar todos sus contenidos. Vivimos en una plácida isla de ignorancia en medio de mares negros e infinitos, pero no fue concebido que debiéramos llegar muy lejos. Hasta el momento las ciencias, cada una orientada en su propia dirección, nos han causado poco daño; pero algún día, la reconstrucción de conocimientos dispersos nos dará a conocer tan terribles panorámicas de la realidad, y lo terrorífico del lugar que ocupamos en ella, que sólo podremos enloquecer como consecuencia de tal revelación, o huir de la mortífera luz hacia la paz y seguridad de una nueva era de tinieblas.',
			'No está muerto lo que puede yacer eternamente; y con el paso de los extraños eones, incluso la Muerte puede morir.',
			'La emoción más antigua y más intensa de la humanidad es el miedo, y el más antiguo y más intenso de los miedos es el miedo a lo desconocido.',
			'La emoción más antigua y más intensa de la humanidad es el miedo, y el más antiguo y más intenso de los miedos es el miedo a lo desconocido.',

		])->random();
	}

}
