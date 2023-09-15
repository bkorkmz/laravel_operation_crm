document.getElementById('submit-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Form verilerini FormData nesnesi olarak alın
    var formData = new FormData(this);

    // Formun action verisini alın
    var action = this.getAttribute('action');

    // Fetch ile POST isteği gönderin
    fetch(action, {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (response.ok) {
                return response.json(); // JSON formatındaki yanıtı işle
            } else {
                return response.text().then(text => {throw new Error(text)}); // Hata mesajını fırlat
            }
        })
        .then(data => {
            if (data.message === "success") {
                toastr["success"]('İşlem Başarılı');
                console.log(data)

// Başarılı yanıt durumunda oturumu temizle

                if (data.action == 'create')
                {
                    $('table tbody').empty();;
                    $('textarea[name="question"]').val('')
                }
                sessionStorage.removeItem('answers');

            } else if (data.errors) {
                const errorMessages = Object.values(data.errors).flat();
                errorMessages.map(function(element, index, array) {
                    toastr["error"](element);
                    console.log('1',element)
                })

            } else {
                toastr["error"]("İşlem Başarısız !!!");
                console.log('2',data)

            }
        })
        .catch(function(error) {
            toastr["error"]("İşlem Başarısız !!!");
            console.log('2',error);
        })
    
    
    
    
    
    
    
    
    
    
    
    ////////////////////////////////////////////////////////////////////////////////////////
    // fetch(action, {
    //     method: 'POST',
    //     body: formData
    // })
    //     .then(response => response.json()) // JSON formatındaki yanıtı işle
    //     .then(data => {
    //         if (data.message === "success") {
    //             toastr["success"]('İşlem Başarılı');
    //
    //             // Başarılı yanıt durumunda oturumu temizle
    //
    //             if (data.action == 'create')
    //             {
    //                 $('table tbody').empty();;
    //                 $('textarea[name="question"]').val('')
    //             }
    //             sessionStorage.removeItem('answers');
    //
    //
    //         } else if (data.errors) {
    //             const errorMessages = Object.values(data.errors).flat();
    //             errorMessages.map(function(element, index, array) {
    //                 toastr["error"](element);
    //                 console.log('1',errorMessages)
    //             })
    //
    //
    //         } else {
    //             toastr["error"](data.errors);
    //             console.log('2',data)
    //
    //         }
    //     })
    //     .catch(function(error) {
    //         toastr["error"](error.message);
    //         console.log('2',error)
    //     });
});