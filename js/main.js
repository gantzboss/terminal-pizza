$(()=>{
    let form = $("form");
    form.css('display','block');
    function insert(text){
        let el = $('<p></p>');
        el.text(text);
        $('.main-content div').append(el);
    }

    form.submit((e)=>{
        e.preventDefault();
        let url = 'order';
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: (data)=>{
                form.remove();
                insert('Ваш заказ:');
                insert(`Пицца ${data.pizza} ${data.size}см. по цене ${data.pricePizza.toFixed(2)}р.`);
                insert(`Соус ${data.sauce} по цене ${data.priceSauce.toFixed(2)}р.`);
                insert(`ИТОГ: ${data.price.toFixed(2)}р.`);
            }
            });

        
    });
});
