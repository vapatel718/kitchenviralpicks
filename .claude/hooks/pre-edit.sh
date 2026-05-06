#!/bin/bash
# pre-edit.sh — KitchenViralPicks Pre-Edit Hook
# Runs automatically before every file change.
# Takes a Git snapshot so any change can be instantly reversed.

echo "📸 KVP Pre-Edit Hook: Taking Git snapshot before changes..."

# Navigate to site root
cd "/Users/varunpatel/Local Sites/kitchenviralpicks/app/public" || exit 1

# Check if Git is initialized
if [ ! -d ".git" ]; then
  echo "❌ ERROR: Git not initialized. Run task 0.8 first."
  exit 1
fi

# Stage all current files
git add -A

# Check if there is anything to commit
if git diff --cached --quiet; then
  echo "✅ No changes to snapshot — working tree is clean."
  exit 0
fi

# Commit the snapshot with timestamp
TIMESTAMP=$(date "+%Y-%m-%d %H:%M:%S")
git commit -m "AUTO SNAPSHOT: Pre-edit backup — $TIMESTAMP"

echo "✅ Snapshot taken. Safe to proceed with edits."
