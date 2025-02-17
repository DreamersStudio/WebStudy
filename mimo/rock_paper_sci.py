import random
choices = ["rock", "paper", "scissors"]
computer_choice = random.choice(choices)
print("Let's play rock, paper, or scissors")

winner = ''
player_wins = computer_wins = 0

for i in range(3):
  player_choice = input("Choosing rock, paper or scissors: \n").lower()
  print(f"Computer chose: {computer_choice}")
  if (player_choice == "rock" and computer_choice == "scissors") or (player_choice == "scissors" and computer_choice == "paper") or (player_choice == "paper" and computer_choice == "rock"):
    winner = "Player"
  elif (player_choice == "scissors" and computer_choice == "rock") or (player_choice == "paper" and computer_choice == "scissors") or (player_choice == "rock" and computer_choice == "paper"):
    winner = "Computer"
  else:
    winner == "Tie"

  if winner == "Player":
    print("Player won")
    player_wins += 1
  elif winner == "Computer":
    print("Computer won")
    computer_wins += 1
  else:
    print("It's a tie")
if player_wins > computer_wins:
  print("Player wins")
elif player_wins < computer_wins:
  print("Computer wins")
else:
  print("It's a tie")