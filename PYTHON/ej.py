
continua = True
while(continua):
    try:
        amigos = input("Cuantos amigos tienes: ")
        for amigo in range(int(amigos)):
            amigo = input("introduce un amigo: ")
            print("hola", amigo)
        continua = False
    except ValueError:
        print(amigos, "no es un numero, intente de nuevo")
