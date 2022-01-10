var data = {};
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

function httpPost(theUrl, content)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "POST", theUrl, false ); // false for synchronous request
    xmlHttp.send( content );
    return xmlHttp.responseText;
}
function exists(name) {
        return localStorage[name] != undefined;
}
function enforce(name) {
        document.getElementById("btn"+name).disabled = exists(name);
		document.getElementById("val"+name).disabled = exists(name);
}
function create(name) {
        var val = eval(document.getElementById("val"+name).value);
		if (val < 1 || 6 < val) {
			document.getElementById("val"+name).stlye.backgroundColor = "#fca59f";
			return;
		}		
		httpPost("data.php","{\"" + name + "\":" +  val  + "}");
        localStorage[name] = true;
        location.reload(); 
}

function init() {
        data = JSON.parse(httpGet("data.php"));
	//Semester 1
        enforce("GET");
        enforce("InfI");
        enforce("MatI");
        enforce("GP");
	//Semester 2
        enforce("GETII");
        enforce("InfII");
        enforce("MatII");
        enforce("Phys");
        enforce("Digi");
        enforce("EMI");
	//Semester 3
        enforce("MatIII");
        enforce("GETIII");
        enforce("SYS");
        enforce("EBUS");
	
        var t = [];
        var n = 0;
        for (var key in data) {
                if (data.hasOwnProperty(key)) {
                        t[n++] = {
                                name: key,
                                x: data[key],
                                type: "violin",
                                side: "positive",
                                points: "all",
                                pointpos: -0.1,
                                jitter: 0.1,
                        };
                }
        }

        var layout = {
                title: 'Distribution Graph',
                height: 1500
        }

        Plotly.newPlot('myDiv', t, layout);
}
