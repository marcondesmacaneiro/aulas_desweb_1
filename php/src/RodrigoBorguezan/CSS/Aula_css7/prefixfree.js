/ **
 * StyleFix 1.0.3 e PrefixFree 1.0.7
* @author  Lea Verou
 * Licença MIT
 * /

( function () {

if ( ! window . addEventListener ) {
	retorno ;
}

var self =  window . StyleFix  = {
	link :  função ( link ) {
		var url =  link . href  ||  link . getAttribute ( ' data-href ' );
		try {
			// Ignore as folhas de estilo com o atributo data-noprefix, bem como as folhas de estilo alternativas ou sem o atributo (data-) href
			if ( ! url ||  link . rel  ! ==  ' folha de  estilo ' ||  link . hasAttribute ( ' data-noprefix ' )) {
				retorno ;
			}
		}
		catch (e) {
			retorno ;
		}

		var de base =  URL . substitua ( / [ ^ \ / ] + $ / , ' ' ),
		    base_scheme = ( / ^ [ az ] {3,10} : / . exec (base) || [ ' ' ]) [ 0 ],
		    base_domain = ( / ^ [ az ] {3,10} : \ / \ / [ ^ \ / ] + / . exec (base) || [ ' ' ]) [ 0 ],
		    base_query = / ^ ( [ ^ ?] * ) \? ? / . exec (url) [ 1 ], 
		    pai =  link . parentNode ,
		    xhr =  new  XMLHttpRequest (),
		    processo ;

		xhr . onreadystatechange  =  function () {
			se ( XHR . readyState  ===  4 ) {
				processo ();
			}
		};

		process  =  function () {
				var css =  xhr . responseText ;

				if (css &&  link . parentNode  && ( ! xhr . status  ||  xhr . status  <  400  ||  xhr . status  >  600 )) {
					css =  self . correção (css, true , link);

					// Converta URLs relativos em absoluto, se necessário
					if (css && base) {
						css =  css . substituir ( / url \ ( \ s *? ((?: " | ') ? ) ( . +? ) \ 1 \ s *? \) / gi , função ( $ 0 , quote , url ) {
							if ( / ^ ( [ az ] {3,10} : | #) / i . test (url)) { // Absoluto ou relativo a hash
								devolve $ 0;
							}
							else  if ( / ^ \ / \ / / . test (url)) { // relativo ao esquema
								// Pode conter seqüências como /../ e /./, mas aqueles DO trabalham
								return  ' url (" '  + base_scheme + url +  ' ") ' ;
							}
							else  if ( / ^ \ / / . test (url)) { // relativo ao domínio
								return  ' url (" '  + base_domain + url +  ' ") ' ;
							}
							else  if ( / ^ \? / . test (url)) { // Consulta-relativa
								return  ' url (" '  + base_query + url +  ' ") ' ;
							}
							mais {
								// relativo ao caminho
								return  ' url (" '  + base + url +  ' ") ' ;
							}
						});

						// URLs de comportamento não devem ser convertidos (Problema nº 19)
						// base deve ser escapado antes de ser adicionado ao RegExp (Issue # 81)
						var escaped_base =  base . substituir ( / ( [ \\\ ^ \ $ * + [ \] ? {} . =! :( |)] ) / g , " \\ $ 1 " );
						css =  css . replace ( RegExp ( ' \\ b (comportamento: \\ s *? url \\ ( \' ? "?) '  + escaped_base, ' gi ' ), ' $ 1 ' );
						}

					var style =  document . createElement ( ' style ' );
					estilo . textContent  =  ' / * # sourceURL = ' + link . getAttribute ( ' href ' ) + ' * / \ n / * @ sourceURL = ' + link . getAttribute ( ' href ' ) + ' * / \ n '  + css;
					estilo . media  =  link . mídia ;
					estilo . desativado  =  link . desativado ;
					estilo . setAttribute ( ' data-href ' , link . getAttribute ( ' href ' ));

					se ( link . id ) estilo . id  =  link . id ;

					pai . insertBefore (estilo, link);
					pai . removeChild (link);

					estilo . media  =  link . mídia ; // Duplicar é intencional. Veja a edição # 31
				}
		};

		try {
			xhr . open ( ' GET ' , url);
			xhr . enviar ( nulo );
		} pegar (e) {
			// Retorna para XDomainRequest se disponível
			if ( tipo de XDomainRequest ! =  " indefinido " ) {
				xhr =  new  XDomainRequest ();
				xhr . onerror  =  xhr . onprogress  =  function () {};
				xhr . onload  =  process ;
				xhr . open ( " GET " , url);
				xhr . enviar ( nulo );
			}
		}

		link . setAttribute ( ' data-inprogress ' , ' ' );
	}

	styleElement :  function ( style ) {
		if ( estilo . hasAttribute ( ' dados-noprefix ' )) {
			retorno ;
		}
		var disabled =  style . desativado ;

		estilo . textContent  =  self . correção ( estilo . textContent , true , style);

		estilo . desativado  = desativado;
	}

	styleAttribute :  function ( element ) {
		var css =  element . getAttribute ( ' style ' );

		css =  self . correção (css, false , element);

		elemento . setAttribute ( ' style ' , css);
	}

	process :  function () {
		// Folhas de estilo vinculadas
		$ ( ' link [rel = "stylesheet"]: não ([data-inprogress]) ' ). forEach ( StyleFix . link );

		// Folhas de estilo em linha
		$ ( ' estilo ' ). forEach ( StyleFix . styleElement );

		// Inline styles
		$ ( ' [estilo] ' ). forEach ( StyleFix . styleAttribute );
		
		var  event  =  document . createEvent ( ' Evento ' );
		evento . initEvent ( ' StyleFixProcessed ' , true , true );
		documento . dispatchEvent ( evento );

	}

	registre -  se : function ( fixer , index ) {
		( Auto . Fixadores  =  independentes . Fixadores  || [])
			. emenda (index ===  undefined ?  self . fixers . comprimento  : index, 0 , fixador);
	}

	correção :  função ( css , raw , element ) {
		if ( self . fixers ) {
		  para ( var i = 0 ; i < auto . fixadores . comprimento ; i ++ ) {
			css =  self . fixadores [i] (css, raw, element) || css;
		  }
		}

		return css;
	}

	camelCase :  function ( str ) {
		return  str . substituir ( / - ( [ z ] ) / g , função ( $ 0 , $ 1 ) { return  $ 1 . toUpperCase ();}). substituir ( ' - ' , ' ' );
	}

	deCamelCase :  function ( str ) {
		return  str . substituir ( / [ Z ] / g , função ( $ 0 ) { retorno  ' - '  +  $ 0 . toLowerCase ()});
	}
};

/ ** ************************************
 * Estilos de processo
************************************* * /
( function () {
	setTimeout ( function () {
		$ ( ' link [rel = "stylesheet"] ' ). forEach ( StyleFix . link );
	}, 10 );

	documento . addEventListener ( ' DOMContentLoaded ' , StyleFix . process , false );
}) ();

função  $ ( expr , con ) {
	return []. fatia . call ((con ||  document ). querySelectorAll (expr));
}

}) ();

/ **
 * PrefixFree
 * /
( função ( raiz ) {

if ( ! window . StyleFix  ||  ! window . getComputedStyle ) {
	retorno ;
}

// Ajudante privado
 correção de função (o que , antes , depois , substituição , css ) {
	o que = eu [o que];

	if (o que . comprimento ) {
		var regex =  RegExp (antes +  ' ( '  + o  que . join ( ' | ' ) +  ' ) '  + depois, ' gi ' );

		css =  css . substituir (regex, substituição);
	}

	return css;
}

var self =  window . PrefixFree  = {
	prefixCSS :  function ( css , raw , element ) {
		var prefix =  self . prefixo ;

		// Correção de ângulos de gradiente
		if ( self . functions . indexOf ( ' gradiente linear ' ) >  - 1 ) {
			// Gradientes são suportados com um prefixo, converter ângulos em legado
			css =  css . substitua ( / ( \ s | : | ,) (repetindo-) ? gradiente linear \ ( \ s * (- ? \ d * \. ? \ d * ) deg / ig , função ( $ 0 , delim , repetindo , deg ) {
				return delim + (repetindo ||  ' ' ) +  ' gradiente linear ( '  + ( 90 - deg) +  ' deg ') ;
			});
		}

		css =  fix ( ' funções ' , ' ( \\ s |: |,) ' , ' \\ s * \\ ( ' , ' $ 1 '  + prefixo +  ' $ 2 ( ' , css);
		css =  corrigir ( ' palavras-chave ' , ' ( \\ s | :) ' , ' ( \\ s |; | \\ } | $) ' , ' $ 1 '  + prefixo +  ' $ 2 $ 3 ' , css);
		css =  fix ( ' propriedades ' , ' (^ | \\ {| \\ s |;) ' , ' \\ s *: ' , ' $ 1 '  + prefixo +  ' $ 2: ' , css);

		// Prefixo propriedades * valores dentro * (issue # 8)
		se ( auto . propriedades . comprimento ) {
			var regex =  RegExp ( ' \\ b ( '  +  self . propriedades . join ( ' | ' ) +  ' ) (?! :) ' , ' gi ' );

			css =  fix ( ' valueProperties ' , ' \\ b ' , ' : (. +?); ' , function ( $ 0 ) {
				devolver  $ 0 . replace (regex, prefixo +  " $ 1 " )
			}, css);
		}

		if (raw) {
			css =  fix ( ' seletores ' , ' ' , ' \\ b ' , self . prefixSelector , css);
			css =  fix ( ' atrules ' , ' @ ' , ' \\ b ' , ' @ '  + prefixo +  ' $ 1 ' , css);
		}

		// Corrigir prefixos duplos
		css =  css . substituir ( RegExp ( ' - '  + prefixo, ' g ' ), ' - ' );

		// Prefixo curinga
		css =  css . substituir ( / - \ * - (? = [ az ] + ) / gi , self . prefixo );

		return css;
	}

	propriedade :  function ( propriedade ) {
		return ( self . propriedades . indexOf (propriedade) > = 0  ?  self . prefixo  :  ' ' ) + propriedade;
	}

	valor :  function ( valor , propriedade ) {
		value =  fix ( ' funções ' , ' (^ | \\ s |,) ' , ' \\ s * \\ ( ' , ' $ 1 '  +  auto . prefixo  +  ' $ 2 ( ' , valor);
		value =  fix ( ' palavras-chave ' , ' (^ | \\ s) ' , ' ( \\ s | $) ' , ' $ 1 '  +  auto . prefixo  +  ' $ 2 $ 3 ' , valor);

		if ( self . valueProperties . indexOf (propriedade) > =  0 ) {
			value =  fix ( ' propriedades ' , ' (^ | \\ s |,) ' , ' ($ | \\ s |,) ' , ' $ 1 ' + auto . prefixo + ' $ 2 $ 3 ' , valor);
		}

		valor de retorno ;
	}

	prefixSelector :  function ( selector ) {
		retorno  auto . selectorMap [seletor] || seletor
	}

	// Aviso: os prefixos não importam, mesmo que a propriedade seja suportada sem prefixo
	prefixProperty :  function ( property , camelCase ) {
		var prefixado =  self . prefixo  + propriedade;

		retorno camelCase ?  StyleFix . camelCase (prefixado) : prefixado;
	}
};

/ ** ************************************
 * Propriedades
************************************* * /
( function () {
	var prefixos = {}
		properties = [],
		atalhos = {}
		style =  getComputedStyle ( document . documentElement , null ),
		dummy =  documento . createElement ( ' div ' ). estilo ;

	// Por que estamos fazendo isso em vez de iterar sobre propriedades em um objeto .style? Porque o Webkit
	// 1. O Webkit antigo não irá interagir sobre eles.
	// 2. O Webkit recente irá, mas as propriedades prefixadas 'Webkit' não são enumeráveis. O 'webkit'
	//     (minúsculas 'w') são, mas não 'deCamelCase () `em um prefixo que possamos detectar.

	var  iterate  =  function ( propriedade ) {
		if ( / ^ - [ ^ -] / . test (propriedade)) {
			propriedades . push (propriedade);

			var parts =  property . split ( ' - ' ),
				prefixo = partes [ 1 ];

			// Count usa prefixo
			prefixos [prefixo] =  ++ prefixos [prefixo] ||  1 ;

			// Isso ajuda a determinar atalhos
			while ( partes . comprimento  >  3 ) {
				partes . pop ();

				var shorthand =  parts . join ( ' - ' );

				if ( suporte (abreviado) &&  properties . indexOf (taquigrafia) ===  - 1 ) {
					propriedades . push (taquigrafia);
				}
			}
		}
	}
	supported  =  function ( propriedade ) {
		devolve o  StyleFix . camelCase (propriedade) em dummy;
	}

	// Alguns navegadores têm índices numéricos para as propriedades, outros não
	if (estilo &&  style . length  >  0 ) {
		para ( var i = 0 ; i < estilo . comprimento ; i ++ ) {
			iterar (estilo [i])
		}
	}
	mais {
		para ( var property in style) {
			iterar ( StyleFix . deCamelCase (propriedade));
		}
	}

	// Encontrar prefixo usado com mais frequência
	var highest = {usa : 0 };
	para ( prefixo var em prefixos) {
		var usa = prefixos [prefixo];

		if ( mais alto . usa  < usa) {
			maior = {prefixo : prefixo, usa : usa};
		}
	}

	auto . prefixo  =  ' - '  +  maior . prefixo  +  ' - ' ;
	auto . Prefixo  =  StyleFix . camelCase ( auto . prefixo );

	auto . properties  = [];

	// Obter propriedades APENAS suportadas com um prefixo
	para ( var i = 0 ; i < propriedades . comprimento ; i ++ ) {
		var property = propriedades [i];

		if ( propriedade . indexOf ( self . prefix ) ===  0 ) { // podemos ter vários prefixos, como o Opera
			var unprefixed =  propriedade . fatia ( auto . prefixo . comprimento );

			if ( ! supported (unprefixed)) {
				auto . propriedades . empurrar (sem pré-fixação);
			}
		}
	}

	// Correção do IE
	if ( self . Prefixo  ==  ' Ms '
	  &&  ! ( ' transformar '  no manequim)
	  &&  ! ( ' MsTransform '  no manequim)
	  && ( ' msTransform '  no manequim)) {
		auto . propriedades . push ( ' transform ' , ' transform-origin ' );
	}

	auto . propriedades . sort ();
}) ();

/ ** ************************************
 * Valores
************************************* * /
( function () {
// Valores que podem precisar de prefixos
var functions = {
	' gradiente linear ' : {
		propriedade :  ' backgroundImage ' ,
		params :  ' vermelho, verde-azulado '
	}
	' calc ' : {
		propriedade :  ' largura ' ,
		params :  ' 1px + 5% '
	}
	' element ' : {
		propriedade :  ' backgroundImage ' ,
		params :  ' #foo '
	}
	' cross-fade ' : {
		propriedade :  ' backgroundImage ' ,
		params :  ' url (a.png), url (b.png), 50% '
	}
	' conjunto de imagens ' : {
		propriedade :  ' backgroundImage ' ,
		params :  ' url (a.png) 1x, url (b.png) 2x '
	}
};


funções [ ' gradiente linear de repetição ' ] =
funções [ ' repeat-radial-gradient ' ] =
funções [ ' gradiente radial ' ] =
funções [ ' gradiente linear ' ];

// Nota: As propriedades designadas são apenas para * test * support.
// As palavras-chave serão prefixadas em todos os lugares.
var keywords = {
	' inicial ' :  ' cor ' ,
	' agarrar ' :  ' cursor ' ,
	' agarrando ' :  ' cursor ' ,
	' zoom-in ' :  ' cursor ' ,
	' zoom-out ' :  ' cursor ' ,
	' box ' :  ' display ' ,
	' flexbox ' :  ' display ' ,
	' inline-flexbox ' :  ' display ' ,
	' flex ' :  ' display ' ,
	' inline-flex ' :  ' display ' ,
	' grid ' :  ' display ' ,
	' inline-grid ' :  ' display ' ,
	' max-content ' :  ' largura ' ,
	' min-content ' :  ' largura ' ,
	' fit-content ' :  ' largura ' ,
	' preenchimento disponível ' :  ' largura ' ,
	' contain-floats ' :  ' largura '
};

auto . funções  = [];
auto . keywords  = [];

var style =  document . createElement ( ' div ' ). estilo ;

função  suportada ( valor , propriedade ) {
	style [propriedade] =  ' ' ;
	style [propriedade] = valor;

	retorno  !! style [propriedade];
}

para ( var func in functions) {
	var test = funções [func],
		propriedade =  teste . propriedade ,
		valor = func +  ' ( '  +  teste . params  +  ' ) ' ;

	if ( ! suportado (valor, propriedade)
	  &&  suportado ( self . prefixo  + valor, propriedade)) {
		// É suportado, mas com um prefixo
		auto . funções . push (func);
	}
}

para ( var keyword in keywords) {
	var property = palavras-chave [keyword];

	if ( ! suportado (palavra-chave, propriedade)
	  &&  supported ( self . prefixo  + keyword, propriedade)) {
		// É suportado, mas com um prefixo
		auto . palavras-chave . push (palavra-chave);
	}
}

}) ();

/ ** ************************************
 * Seletores e @ -rules
************************************* * /
( function () {

var
seletores = {
	' : any-link ' :  null ,
	' :: pano de fundo ' :  null ,
	' : fullscreen ' :  nulo ,
	' : tela cheia ' :  ' : tela cheia ' ,
	// suspiro
	' :: espaço reservado ' :  null ,
	' : espaço reservado ' :  ' :: espaço reservado ' ,
	' :: input-placeholder ' :  ' :: placeholder ' ,
	' : input-placeholder ' :  ' :: placeholder ' ,
	' : somente leitura ' :  null ,
	' : read-write ' :  nulo ,
	' :: selection ' :  null
}

atrules = {
	' keyframes ' :  ' name ' ,
	' viewport ' :  null ,
	' documento ' :  ' regexp (".") '
};

auto . seletores  = [];
auto . selectorMap  = {};
auto . atrules  = [];

var style =  root . appendChild ( document . createElement ( ' style ' ));

função  suportada ( seletor ) {
	estilo . textContent  = seletor +  ' {} ' ;  // O Safari 4 tem problemas com style.innerHTML

	retorno  !! estilo . folha . cssRules . comprimento ;
}

para ( seletor de variáveis em seletores) {
	var standard = seletores [seletor] || seletor
	var prefixed =  selector . substituir ( / :: :: ? / , function ( $ 0 ) { return $ 0 +  self . prefixo })
	if ( ! suportado (padrão) &&  supported (prefixed)) {
		auto . seletores . empurrar (padrão);
		auto . selectorMap [standard] = prefixado;
	}
}

para ( var atrule in atrules) {
	teste de var = atrule +  '  '  + (atrules [atrule] ||  ' ' );

	se ( ! suportado ( ' @ '  + teste) &&  suportado ( ' @ '  +  auto . prefixo  + teste)) {
		auto . atrules . empurrar (atrule);
	}
}

raiz . removeChild (estilo);

}) ();

// Propriedades que aceitam propriedades como seu valor
auto . valueProperties  = [
	' transição ' ,
	' propriedade de transição ' ,
	' vai mudar '
]

// Adicione a classe para o prefixo atual
raiz . className  + =  '  '  +  auto . prefixo ;

StyleFix . register ( self . prefixCSS );


}) ( documento . documentElement );