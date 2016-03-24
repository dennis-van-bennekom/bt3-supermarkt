(function() {
  if ('draggable' in document.createElement('span')) {
      function calculateTotal() {
        var prices = productList.querySelectorAll('.prijs');

        var price = 0;

        [].forEach.call(prices, function(element) {
          price += parseFloat(element.innerHTML);
        });

        return parseFloat(price.toFixed(2));
      }

      var products = document.querySelectorAll('.product');
      var dropArea = document.querySelector('.drop-area');
      var productList = document.querySelector('.producten-lijst');
      var totaal = document.querySelector('.totaal .prijs');

      [].forEach.call(products, function(product) {
        product.addEventListener('dragstart', function(e) {
            e.dataTransfer.setData('text/html', this.innerHTML);
        });

        product.addEventListener('dragend', function() {
          dropArea.classList.remove('over');

          dropArea.classList.add('done');

          setTimeout(function() {
            dropArea.classList.remove('done');
          }, 300);
        });
      });

      dropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = "move";
      });

      dropArea.addEventListener('dragenter', function() {
        dropArea.classList.add('over');
      });

      dropArea.addEventListener('dragleave', function() {
        dropArea.classList.remove('over');
      });

      dropArea.addEventListener('drop', function(e) {
        e.preventDefault();

        var element = e.dataTransfer.getData('text/html');
        product = document.createElement('div');
        product.innerHTML = element;

        var naam = product.querySelector('input[name="product"]').value;
        var prijs = product.querySelector('input[name="prijs"]').value;

        var content = "<button>x</button> " + naam + " <small class='prijs'>" + prijs + "</small>";

        var productElement = document.createElement('li');
        productElement.innerHTML = content;
        productList.appendChild(productElement);

        totaal.innerHTML = calculateTotal();

        productElement.addEventListener('click', function(e) {
          productElement.remove();
          totaal.innerHTML = calculateTotal();
        });
      });
  }
}());
