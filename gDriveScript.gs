function doPost(e) {
  try {
    const folderName = "IMEI PDF Files";
    
    var data = Utilities.base64Decode(e.parameters.data);
    var blob = Utilities.newBlob(data, e.parameters.mimetype, e.parameters.filename);
    
    var pdfFolder = DriveApp.getFoldersByName(folderName);
    var folder = null;
    
    // create folder if not exist
    if(pdfFolder.hasNext()){
      folder = pdfFolder.next();
    } else {
      folder = DriveApp.createFolder(folderName);
    }
    
    folder.createFile(blob);
    
    return ContentService.createTextOutput("Successful");
  } catch(e) {
    return ContentService.createTextOutput(e.message);
  } 
}