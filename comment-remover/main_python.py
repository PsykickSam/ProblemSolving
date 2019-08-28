"""
"" Comment Remover 
"" Only for 'Python' programs
"""

# globals
mPathOfFile = 'files/code.py'
mSingleLineCommentSymbol = '#'
mMultiLineCommentSymbol = '"""'


# functions
def readFile(path):
  file = open(path, 'r')
  data = file.read(256)
  return data


def removeSingleLineComment(symbol, data):
  removedData = ''
  flagRemoveComment = False
  for char in data:
    if char == symbol:
      flagRemoveComment = True
    if flagRemoveComment and char == '\n':
      flagRemoveComment = False
      continue

    if not flagRemoveComment:
      removedData += char

  return removedData


def removeMultiLineComment(symbol, data):
  sizeOfSymbol = len(symbol) - 1 + 1  # (1) for '\n'
  flagRemoveComment = False
  indexOfSymbol = -1
  removedData = ''

  for index, char in enumerate(data):
    if data[index:index+3] == symbol:
      flagRemoveComment = not flagRemoveComment
      if not flagRemoveComment:
        indexOfSymbol = sizeOfSymbol

    if indexOfSymbol >= 0:
      indexOfSymbol -= 1
      continue
    
    if not flagRemoveComment:
      removedData += char
    
  return removedData


# main
def main():
  data = readFile(mPathOfFile)
  data = removeSingleLineComment(mSingleLineCommentSymbol, data)
  data = removeMultiLineComment(mMultiLineCommentSymbol, data)
  print(data)


# run
if __name__ == '__main__':
  main()
