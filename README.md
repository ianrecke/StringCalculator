PHP 8 testing base

En este problema se plantea la suma o multiplicacion de un numero indefinido de elementos. Dichos elementos se encuentran en tipo String. Para resolver el problema he dividido el codigo

1. La funcion principal: esta funcion implementa las interfaces y emplea sus funciones para resolver el problema. Dentro de esta podemos encontrar 3 funciones, add() empleada para sumar los numeros, multiply() empleada para multiplicar los numeros y errorLogs() empleada para mostrar los diferentes mensajes de error


2. La interfaz de Error. Esta interfaz tiene multiples errores, que son la definición de los distintos mensajes de error que puede devolver el programa.


3. La interfaz de Operations. Contiene las funciones necesarias encargadas de realizar las operaciones de suma y multiplicacion con y sin separadores personalizados.


4. La interfaz de Rules. Contiene las reglas que el programa debe cumplir para que funcione correctamente.

Run: composer install