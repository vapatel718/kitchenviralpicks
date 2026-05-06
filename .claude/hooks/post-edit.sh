#!/bin/bash
# post-edit.sh — KitchenViralPicks Post-Edit Hook
# Runs automatically after every file change.
# Verifies files exist and are not empty.

echo "🔍 KVP Post-Edit Hook: Verifying changes..."

# Navigate to site root
cd "/Users/varunpatel/Local Sites/kitchenviralpicks/app/public" || exit 1

# Track if any checks fail
ERRORS=0

# Check every file passed as argument
for FILE in "$@"; do
  if [ ! -f "$FILE" ]; then
    echo "❌ MISSING: $FILE was not created"
    ERRORS=$((ERRORS + 1))
  elif [ ! -s "$FILE" ]; then
    echo "❌ EMPTY: $FILE exists but has no content"
    ERRORS=$((ERRORS + 1))
  else
    echo "✅ OK: $FILE"
  fi
done

# Final result
if [ "$ERRORS" -eq 0 ]; then
  echo "✅ All files verified. Post-edit check passed."
  exit 0
else
  echo "❌ $ERRORS problem(s) found. Review before continuing."
  exit 1
fi
