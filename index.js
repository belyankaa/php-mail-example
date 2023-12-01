document.addEventListener('DOMContentLoaded', () => {


    document.getElementById('button').onclick = (e) => {
        e.preventDefault();
        send()
            .then(data => console.log(data))
    }

    async function send() {
        const input1 = document.getElementById('1').value;
        const input2 = document.getElementById('2').value;
        const input3 = document.getElementById('3').value;



        const formData = {
            email: input1,
            number: input2,
            text: input3
        }

        const formData2 = JSON.stringify(formData)

        let response = await fetch('sendmail.php', {
            method: 'POST',
            body: formData2
        });

        if (response.ok) {
            let result = await response.json();
            console.log(result.message)
        } else {
            console.log(response)
        }
    }
})