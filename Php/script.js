function changeApp()
{
  var radioPres = document.getElementById('radioPres').checked;
  if(radioPres)
  {
    document.getElementById('newSer').disabled = true;
    document.getElementById('newMar').disabled = true;
    document.getElementById('newMod').disabled = true;
    document.getElementById('newCod').disabled = true;
    document.getElementById('pres').disabled = false;
  }
  else
  {
    document.getElementById('pres').disabled = true;
    document.getElementById('newSer').disabled = false;
    document.getElementById('newMar').disabled = false;
    document.getElementById('newMod').disabled = false;
    document.getElementById('newCod').disabled = false;
  }
}

function changeRicerca()
{
  //Rapporti
  with(document.Ricerca)
  {
    if(document.getElementById("tip").checked)
    {
      str1.disabled=false;
      str2.disabled=true;
      str3.disabled=true;
    }
    if(document.getElementById("dat").checked)
    {
      str1.disabled=true;
      str2.disabled=false;
      str3.disabled=true;
    }
    if(document.getElementById("ubi").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=false;
    }
  }
}
    
function changeRicercaTipo()
{
  //Tipi
  with(document.RicercaTipo)
  {
    if(document.getElementById("cv").checked)
    {
      str1.disabled=false;
      str2.disabled=true;
    }
    if(document.getElementById("des").checked)
    {
      str1.disabled=true;
      str2.disabled=false;
    }
  }
}

function changeRicercaOspedale()
{
  //Ospedali
  with(document.RicercaOspedale)
  {
    if(document.getElementById("nom").checked)
    {
      str1.disabled=false;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
    }
    if(document.getElementById("cit").checked)
    {
      str1.disabled=true;
      str2.disabled=false;
      str3.disabled=true;
      str4.disabled=true;
    }
    if(document.getElementById("ind").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=false;
      str4.disabled=true;
    }
    if(document.getElementById("tel").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=false;
    }
  }
}

function changeRicercaApparecchiatura()
{
  //Apparecchiature
  with(document.RicercaApparecchiatura)
  {
    if(document.getElementById("tp").checked)
    {
      str1.disabled=false;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
    }
    if(document.getElementById("dt").checked)
    {
      str1.disabled=true;
      str2.disabled=false;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
    }
    if(document.getElementById("mod").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=false;
      str4.disabled=true;
      str5.disabled=true;
    }
    if(document.getElementById("cod").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=false;
      str5.disabled=true;
    }
    if(document.getElementById("civ").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=false;
    }
  }
}

function changeRicercaReferente()
{
  //Referenti
  with(document.RicercaReferente)
  {
    if(document.getElementById("n").checked)
    {
      str1.disabled=false;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
    }
    if(document.getElementById("c").checked)
    {
      str1.disabled=true;
      str2.disabled=false;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
    }
    if(document.getElementById("d").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=false;
      str4.disabled=true;
      str5.disabled=true;
    }
    if(document.getElementById("t").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=false;
      str5.disabled=true;
    }
    if(document.getElementById("r").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=false;
    }
  }
}

function changeRicercaTecnico()
{
  //Tecnici
  with(document.RicercaTecnico)
  {
    if(document.getElementById("no").checked)
    {
      str1.disabled=false;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
      str6.disabled=true;
    }
    if(document.getElementById("co").checked)
    {
      str1.disabled=true;
      str2.disabled=false;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
      str6.disabled=true;
    }
    if(document.getElementById("da").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=false;
      str4.disabled=true;
      str5.disabled=true;
      str6.disabled=true;
    }
    if(document.getElementById("te").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=false;
      str5.disabled=true;
      str6.disabled=true;
    }
    if(document.getElementById("az").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=false;
      str6.disabled=true;
    }
    if(document.getElementById("qu").checked)
    {
      str1.disabled=true;
      str2.disabled=true;
      str3.disabled=true;
      str4.disabled=true;
      str5.disabled=true;
      str6.disabled=false;
    }
  }
} 

function checkForm()
{
  with(document.rapporto) 
  {
    if(ubicazione.value=="") 
    { 
      alert("Errore: compilare il campo Ubicazione"); 
      ubicazione.focus(); 
      return false; 
    }
    if(data.value=="") 
    { 
      alert("Errore: compilare il campo Data"); 
      data.focus(); 
      return false; 
    } 
    if(document.getElementById('radioNew').checked)
    {
      if(newSer.value=="") 
      { 
        alert("Errore: compilare il campo Seriale"); 
        serialeApparecchiatura.focus(); 
        return false; 
      } 
      if(newMar.value=="") 
      { 
        alert("Errore: compilare il campo Marca"); 
        marcaApp.focus(); 
        return false; 
      }
      if(newMod.value=="") 
      { 
        alert("Errore: compilare il campo Modello"); 
        modelloApp.focus(); 
        return false; 
      } 
      if(newCod.value=="") 
      { 
        alert("Errore: compilare il campo Codice"); 
        codiceApp.focus(); 
        return false; 
      }
    }
    else
    {
      if(pres.value=="") 
      { 
        alert("Errore: nessuna apparecchiatura selezionata"); 
        serial.focus(); 
        return false; 
      }
    }
  }
  return true; 
}

function checkOspedale()
{
  with(document.ospedale) 
  { 
    if(nome.value=="") 
    { 
      alert("Errore: compilare il campo Nome"); 
      nome.focus(); 
      return false; 
    }
    if(citta.value=="") 
    { 
      alert("Errore: compilare il campo Citta'"); 
      citta.focus(); 
      return false; 
    }
    if(indirizzo.value=="") 
    { 
      alert("Errore: compilare il campo Indirizzo"); 
      indirizzo.focus(); 
      return false; 
    }
    if(telefono.value=="") 
    { 
      alert("Errore: compilare il campo Telefono"); 
      telefono.focus(); 
      return false; 
    } 
  }
  return true; 
}

function checkTecnico()
{
  with(document.tecnico) 
  { 
    if(nome.value=="") 
    { 
      alert("Errore: compilare il campo Nome"); 
      nome.focus(); 
      return false; 
    }
    if(cognome.value=="") 
    { 
      alert("Errore: compilare il campo Cognome'"); 
      cognome.focus(); 
      return false; 
    }
    if(datanascita.value=="") 
    {
      alert("Errore: compilare il campo Data di nascita"); 
      datanascita.focus(); 
      return false; 
    }
    if(telefono.value=="") 
    { 
      alert("Errore: compilare il campo Telefono"); 
      telefono.focus(); 
      return false; 
    }
    if(azienda.value=="") 
    { 
      alert("Errore: compilare il campo Azienda"); 
      azienda.focus(); 
      return false; 
    }
    if(qualifica.value=="") 
    { 
      alert("Errore: compilare il campo Qualifica"); 
      qualifica.focus(); 
      return false; 
    } 
  }
  return true;
}

function checkReferente()
{
  with(document.referente) 
  { 
    if(nome.value=="") 
    { 
      alert("Errore: compilare il campo Nome"); 
      nome.focus(); 
      return false;
    }
    if(cognome.value=="") 
    { 
      alert("Errore: compilare il campo Cognome'"); 
      cognome.focus(); 
      return false; 
    }
    if(datanascita.value=="") 
    { 
      alert("Errore: compilare il campo Data di nascita"); 
      datanascita.focus(); 
      return false; 
    }
    if(telefono.value=="") 
    { 
      alert("Errore: compilare il campo Telefono"); 
      telefono.focus(); 
      return false; 
    }
    if(ruolo.value=="") 
    { 
      alert("Errore: compilare il campo Ruolo"); 
      ruolo.focus(); 
      return false; 
    } 
  }
  return true; 
}


