async function setProvinceField(id, country) {
    try{
        const { provinces } = await $.ajax({ url: `/getprovinces?country=${country}` });
        if (provinces) {
            provinces.map((p) => (
                $(`#${id}`).append(`<option value="${p.province}"> ${p.province}</option>`)
            ))
    
        }
    }
    catch(error){
        console.log(error);
    }

}

async function setMunicipalityField(id, country, province) {
    try{
        const { municipalities } = await $.ajax({ url: `/getmunicipalities?country=${country}&province=${province}` });
        if (municipalities) {
            municipalities.map((m) => (
                $(`#${id}`).append(`<option value="${m.municipality}"> ${m.municipality}</option>`)
            ))
        }
    }catch(error){
        console.log(error);
    }
  
}

async function setBarangayField(id, country, province, municipality) {
    try{
        const { barangays } = await $.ajax({ url: `/getbarangays?country=${country}&province=${province}&municipality=${municipality}` });
        if (barangays) {
            barangays.map((b) => (
                $(`#${id}`).append(`<option value="${b.barangay}"> ${b.barangay}</option>`)
            ))
        }
    }catch(error){
        console.log(error);
    }
}

async function setZipCodeField(id, country, province, municipality, barangay) {
    try{
        const { zipcode } = await $.ajax({ url: `/getzipcode?country=${country}&province=${province}&municipality=${municipality}&barangay=${barangay}` });
        if (zipcode) {
            $(`#${id}`).val(zipcode.zip_code);
        }
    }catch(error){
        console.log(error);
    }
   
}