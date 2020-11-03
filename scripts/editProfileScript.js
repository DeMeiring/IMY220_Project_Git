$('button').on('click',function(){
    let btnValue = $(this).text();
    let index = $(this).index();
    if(btnValue==='Edit'){
        let nameAttr = $('#displayLabels').children().eq(index).text();
        let placeholderText = $('#profileLabelValues').children().eq(index).text();
        let label = $('#profileLabelValues').children().eq(index).replaceWith(`<input type="text" class="editInfo col" name="${nameAttr}" placeholder="${placeholderText}">`);
        $(this).text('Save');
        $(this).attr('type','submit');
    }else{
        let value = $('#profileLabelValues').children().eq(index).val();
        let label = $('#profileLabelValues').children().eq(index).replaceWith(`<label class="profileValueLbl col">${value}</label>`);
        $(this).text('Edit');
        $(this).attr('type','button');
    }


});