window.onload=function()
{
	var canvas= document.getElementById("mycanv");
	if (!canvas)
	{
		alert('Impossible de réccup le canvas');
	}
	var context=canvas.getContext('2d');
	if(!canvas)
	{
		alert('Impossible de reccup le context du canvas');
	}

	var width=canvas.width=window.innerWidth;
	var height=canvas.height=window.innerHeight;
	// Var global
	var finebump=5;
	var niveau=height-50;
	var largeur=100;
	var bumpx=height/2;
	var vitbumpx=20;
	var milieu=bumpx+largeur/2;
	function Boule(x,y,vx,vy,ax,ay,r,i)
	{
		this.x=x;
		this.y=y;
		this.vx=vx;
		this.vy=vy;
		this.ax=ax;
		this.ay=ay;
		this.r=r;
		this.i=i;
	}
	//var init boule
	var nb=1;
	var tab=[];
	var posX=200;
	var posY=200;
	var vitX=5;
	var vitY=-vitX;
	var aY=0.001;
	var aX=-aY;
	var r=10;
	for (var i=0;i<=nb;i++)
	{
		tab.push(new Boule(posX,posY,vitX,vitY,aX,aY,r,i));
	
	}
	function DrawBoule(x,y,R)
	{
		context.beginPath();
		context.arc(x,y,R,0,Math.PI*2,true);
		context.fillStyle="#ff0000";
		context.fill();
		context.closePath();
		context.fillStyle="#000000";
	}
	function bumper(x)
	{
		context.beginPath();
		context.fillRect(x,niveau,largeur,finebump);
		context.closePath();
	}
	function animate()
	{
		//On efface le canvas
		context.clearRect(0,0,width,height);
		for (var i=0;i<=nb;i++)
		{
			if (bumpx<=0)
			{
				bumpx=0;
			}
			if (bumpx+largeur>=width)
			{
				bumpx=width-largeur;
			}
			bumper(bumpx);
			window.onkeypress=function(event){
				switch(event.key){
					case "ArrowLeft":
						bumpx+=-vitbumpx;
						break;
					case "ArrowRight":
						bumpx+=vitbumpx;
						break;
					default:
						null;
				}
			}
			if(((tab[i].x+tab[i].r)<=(bumpx+largeur))&&((tab[i].x+tab[i].r)>=(bumpx))&&(tab[i].y+tab[i].r>=niveau))
			{
				tab[i].vy*=-1;
			}
			DrawBoule(tab[i].x,tab[i].y,tab[i].r);
			tab[i].x+=tab[i].vx;
			tab[i].y+=tab[i].vy;
			tab[i].vx+=tab[i].ax;
			tab[i].vy+=tab[i].ay;
			// Repop lateral
			if(tab[i].x>=width)
			{
				tab[i].vx*=-1;
				tab[i].ax*=-1;
			}
			else
			{
				if (tab[i].x<=0)
				{
					tab[i].vx*=-1;
					tab[i].ax*=-1;
				}
			}	
			console.log(tab[i]);	
			// Repops haut & bas
			if(tab[i].y>=height)
			{
				tab[i].vy*=-1;
				tab[i].ay*=-1;
			}
			else
			{
				if (tab[i].y<=0)
				{
					tab[i].vy*=-1;
					tab[i].ay*=-1;
				}
			}
			
			//if((tab[i].y+tab[i].r)>=(height))
		/*	{
				alert('GAME OVER');
				document.location.reload();
			}*/
		}
	}
	var myInterval=setInterval(animate,1000/36);
}
