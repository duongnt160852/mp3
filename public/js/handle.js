$(".next").click(function(){
	if(undoRedoHandler._redoStack.length==1){
		undoRedoHandler.insert({
			id: arr[(undoRedoHandler._redoStack[0].index+1)%arr.length],
			index:(undoRedoHandler._redoStack[0].index+1)%arr.length
		});
	}
	else{
		undoRedoHandler.getNextState();
	}
	$.get("ajax/album/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id,function(data){
			data=JSON.parse(data);
			$(".song-name").html(data.name);
			$(".artist-name").html("Ca sĩ: ");
			for(i=0;i<data.singer.length;i++){
				if(i==0) $(".artist-name").append(data.singer[i]);
				else $(".artist-name").append(", "+data.singer[i]);
			}
			$(".artist-name").append("- Sáng tác: "+data.musician);
			$(".fill").slider({value:0});
			audio.src=data.link;
			audio.currentTime=0;
			percent=0;
			clearTimeout(timer);
			$("#img1").attr("src",data.image);
			$(".lyric h3").html("Lời bài hát: "+data.name);
			$(".content").html(data.lyric);
			$(".active1 i:first").siblings(".play1").removeClass("fa-pause");
			$(".active1 i:first").siblings(".play1").addClass("fa-play");
			$(".active1").removeClass("active1");
			$("#song1"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id).addClass("active1");
			$(".active1 i:first").siblings(".play1").removeClass("fa-play");
			$(".active1 i:first").siblings(".play1").addClass("fa-pause");

		});
$.get("ajax/songview/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id);
});

$(".previous").click(function(){
  	if(undoRedoHandler._undoStack.length>=1){
  		
  	}
  	else{
  		undoRedoHandler._undoStack.push({
  			id: arr[(undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index+arr.length-1)%arr.length],
			index:(undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index+arr.length-1)%arr.length
		});
  	}
  	a=undoRedoHandler.getPrevState();
  	$.get("ajax/album/"+a.id,function(data){
			data=JSON.parse(data);
			$(".song-name").html(data.name);
			$(".artist-name").html("Ca sĩ: ");
			for(i=0;i<data.singer.length;i++){
				if(i==0) $(".artist-name").append(data.singer[i]);
				else $(".artist-name").append(", "+data.singer[i]);
			}
			$(".artist-name").append("- Sáng tác: "+data.musician);
			$(".fill").slider({value:0});
			audio.src=data.link;
			audio.currentTime=0;
			
			$("#img1").attr("src",data.image);
			$(".lyric h3").html("Lời bài hát: "+data.name);
			$(".content").html(data.lyric);
			$(".active1 i:first").siblings(".play1").removeClass("fa-pause");
			$(".active1 i:first").siblings(".play1").addClass("fa-play");
			$(".active1").removeClass("active1");
			$("#song1"+a.id).addClass("active1");
			$(".active1 i:first").siblings(".play1").removeClass("fa-play");
			$(".active1 i:first").siblings(".play1").addClass("fa-pause");

		});
		$.get("ajax/songview/"+a.id);
});

