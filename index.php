<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            margin: 0;
        }
        .calculator {
            width: 300px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .display {
            width: 100%;
            height: 50px;
            text-align: right;
            font-size: 1.5rem;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            background-color: #ffeb3b;
            border-radius: 8px;
            color: #333;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .button {
            background-color: #03a9f4;
            border: none;
            font-size: 1.5rem;
            padding: 20px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.2s;
            color: white;
        }
        .button:hover {
            background-color: #0288d1;
            transform: scale(1.1);
        }
        .button:active {
            transform: scale(0.95);
        }
        .button.clear {
            background-color: #ff5722;
        }
        .button.clear:hover {
            background-color: #e64a19;
        }
        .button.equal {
            background-color: #8bc34a;
        }
        .button.equal:hover {
            background-color: #689f38;
        }
        .button.operator {
            background-color: #ff9800;
        }
        .button.operator:hover {
            background-color: #f57c00;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" class="display" disabled>
        <div class="buttons">
            <button class="button clear" onclick="clearDisplay()">C</button>
            <button class="button operator" onclick="appendOperation('/')">/</button>
            <button class="button operator" onclick="appendOperation('*')">*</button>
            <button class="button operator" onclick="appendOperation('-')">-</button>

            <button class="button" onclick="appendNumber('7')">7</button>
            <button class="button" onclick="appendNumber('8')">8</button>
            <button class="button" onclick="appendNumber('9')">9</button>
            <button class="button operator" onclick="appendOperation('+')">+</button>

            <button class="button" onclick="appendNumber('4')">4</button>
            <button class="button" onclick="appendNumber('5')">5</button>
            <button class="button" onclick="appendNumber('6')">6</button>
            <button class="button equal" onclick="calculate()">=</button>

            <button class="button" onclick="appendNumber('1')">1</button>
            <button class="button" onclick="appendNumber('2')">2</button>
            <button class="button" onclick="appendNumber('3')">3</button>
            <button class="button" onclick="appendNumber('0')">0</button>
        </div>
    </div>

    <script>
        let currentInput = '';
        let currentOperation = '';
        let previousInput = '';

        function appendNumber(number) {
            currentInput += number;
            document.getElementById('display').value = `${previousInput} ${currentOperation} ${currentInput}`;
        }

        function appendOperation(operation) {
            if (currentInput === '') return;
            if (previousInput !== '') {
                calculate(); // Calculate the previous operation before appending a new one
            }
            currentOperation = operation;
            previousInput = currentInput;
            currentInput = '';
            document.getElementById('display').value = `${previousInput} ${currentOperation}`;
        }

        function calculate() {
            if (previousInput === '' || currentInput === '') return;
            let result;
            let prev = parseFloat(previousInput);
            let current = parseFloat(currentInput);

            switch (currentOperation) {
                case '+':
                    result = prev + current;
                    break;
                case '-':
                    result = prev - current;
                    break;
                case '*':
                    result = prev * current;
                    break;
                case '/':
                    if (current === 0) {
                        alert("Cannot divide by zero");
                        return;
                    }
                    result = prev / current;
                    break;
                default:
                    return;
            }

            currentInput = result.toString();
            currentOperation = '';
            previousInput = '';
            document.getElementById('display').value = currentInput;
        }

        function clearDisplay() {
            currentInput = '';
            previousInput = '';
            currentOperation = '';
            document.getElementById('display').value = '';
        }
    </script>
</body>
</html>
