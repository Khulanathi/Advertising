document.querySelector("#upload").addEventListener("change",(e)=>{
    if(window.File && window.FileReader && window.FileList && window.Blob){
        const files = e.target.files;
        const output = document.querySelector("#queued-div");
        for (let i = 0; i <files.length;i++){
            if(!files[i].type.match("image") && files.every(e => e.name!= files[i].name))continue;
            const picReader = new FileReader();
            picReader.addEventListener("load", function(event){
                const picFile = event.target;
                const div = document.createElement("div");
                div.innerHTML= `<img class ="thumbnail" src="${picFile.result}" title="${picFile.name}"/> <span class="posAbsolute">&times;</span>`;
                output.appendChild(div);
            })
            picReader.readAsDataURL(files[i]);
        }
    }else{
        alert("Your browser doesnt support the files API");
    }
})