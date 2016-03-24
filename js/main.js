(function() {
  if ('draggable' in document.createElement('span')) {
      function handleDragStart(e) {
        e.dataTransfer.setData('text/html', this.innerHTML);
      }

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
        product.addEventListener('dragstart', handleDragStart, false);
      });

      dropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = "move";
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
