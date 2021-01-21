#b
celsius = float(input("Please enter the temperature in celsius:\n"))
fahrenheit = (celsius * 9 / 5) + 32 
print("The temperature in fahrenheit is : " + str(fahrenheit))

#c
import math
radiusCircumference = float(input("Please enter the radius of the circumference:\n"))
areaCircumference = math.pi *radiusCircumference**2
print("The area of the circumference is : " + str(areaCircumference))
#d
radiusSphere = float(input("Please enter the radius of the sphere:\n"))
areaSphere = 4*math.pi *radiusSphere**2
print("The area of the sphere is : " + str(areaSphere))
#e
radiusCylinder = float(input("Please enter the radius of the cylinder:\n"))
heightCylinder = float(input("Please enter the height of the cylinder:\n"))
areaCylinder = heightCylinder*2*math.pi*radiusCylinder + 2*math.pi *radiusCylinder**2
print("The area of the cylinder is : " + str(areaCylinder))

#f
firstName = str(input("Please enter your first name:\n"))
surname = str(input("Please enter your surname:\n"))
print(firstName[0] + ". " + surname[0] + ". ")

#g
age = int(input("Please enter your age:\n"))
print(age >= 18)
