<x-app-layout>
    <h3 id="title">My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- prettier-ignore -->
    <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
          key: "AIzaSyBoxJ1kpvtgK_W1oGR4dZk4Umrg5DM-ioA",
          v: "weekly",
          libraries: "marker",
          // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
          // Add other bootstrap parameters as needed, using camel case.
        });
        
        
       
        $('#title').click(function(){
        
            var mapOptions = {
            center: new google.maps.LatLng(-23.320297355046524, -51.179841224737984),
            zoom: 10,
            mapId: "DEMO_MAP_ID",
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var ponto = new google.maps.LatLng(-25.363882,131.044922);
            var marker = new google.maps.marker.AdvancedMarkerElement({
                position: new google.maps.LatLng(-23.320297355046524, -51.179841224737984),//seta posição
                map: map,//Objeto mapa
                title:"Londrina!"//string que será exibida quando passar o mouse no marker
              
          });
      });
    
       
      </script>
</x-app-layout>
