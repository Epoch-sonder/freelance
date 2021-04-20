function maxSymbols($elem, num, fadeLength) {
	var text = $elem.text(),
		temp = text.split(''),
		step,
		fade,
		result;

	if (!fadeLength) {
		fadeLength = 10;
	}

	fade = temp.slice(num - fadeLength, num);
	temp.length = num - fadeLength;

	result = temp.join('');

	for (var i = 0; i < fadeLength; i++) {
		step = +(1 - (1 / fadeLength * i)).toFixed(2);
		result += '<span style="opacity: ' + step + '">' + fade[i] + '</span>';
	}

	$elem.html(result);
}

maxSymbols($('.textminus'), 200, 30);