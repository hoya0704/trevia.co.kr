function OntextCheck2(str)
{
	var _byte = 0;
	if(str.length != 0)
	{
		for (var i=0; i < str.length; i++) 
		{
			var str2 = str.charAt(i);
			if(escape(str2).length > 4)
			{
				_byte += 2;
			}
			else 
			{
				_byte++;
			}
		}
	}

	if(_byte > 80) return "MMS";
	else return "SMS";
}