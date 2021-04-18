windows.addEventListener("load", () =>{
    screenSaverTimeout();
});

const applyStyles = iframe => {
	let styles = {
		fontColor: "#FFF",
        fontGoogleName: "Inconsolata",
        backgroundColor : "rgba(0,0,0,0)",
        fontSize:"clamp(2.5rem, 2.442rem + 0.233vw, 3.0rem)",
        
	}

	iframe.contentWindow.postMessage(JSON.stringify(styles), "*");	
}


