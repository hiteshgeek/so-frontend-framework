const sampleTrialBalanceData = {
    "company": "Chhabria & Sons Private Limited",
    "period": {
        "start": "2025-04-01",
        "end": "2026-03-31"
    },
    "trialBalance": {
        "id": "root",
        "name": "Root",
        "type": "group",
        "children": [
            {
                "id": "assets",
                "name": "Assets",
                "type": "group",
                "children": [
                    {
                        "id": "current_assets",
                        "name": "Current Assets",
                        "type": "group",
                        "children": [
                            {
                                "id": "cash_bank",
                                "name": "Cash & Bank",
                                "type": "group",
                                "children": [
                                    {
                                        "id": "cash_in_hand",
                                        "name": "Cash in Hand",
                                        "type": "ledger",
                                        "openingDr": 50000.00,
                                        "openingCr": 0,
                                        "debit": 125000.00,
                                        "credit": 85000.00,
                                        "closingDr": 90000.00,
                                        "closingCr": 0
                                    },
                                    {
                                        "id": "bank_accounts",
                                        "name": "Bank Accounts",
                                        "type": "ledger",
                                        "openingDr": 250000.00,
                                        "openingCr": 0,
                                        "debit": 580000.00,
                                        "credit": 420000.00,
                                        "closingDr": 410000.00,
                                        "closingCr": 0
                                    }
                                ]
                            },
                            {
                                "id": "debtors",
                                "name": "Sundry Debtors",
                                "type": "ledger",
                                "openingDr": 380000.00,
                                "openingCr": 0,
                                "debit": 920000.00,
                                "credit": 750000.00,
                                "closingDr": 550000.00,
                                "closingCr": 0
                            },
                            {
                                "id": "stock",
                                "name": "Stock in Hand",
                                "type": "ledger",
                                "openingDr": 450000.00,
                                "openingCr": 0,
                                "debit": 680000.00,
                                "credit": 520000.00,
                                "closingDr": 610000.00,
                                "closingCr": 0
                            }
                        ]
                    },
                    {
                        "id": "fixed_assets",
                        "name": "Fixed Assets",
                        "type": "group",
                        "children": [
                            {
                                "id": "furniture_fixtures",
                                "name": "Furniture & Fixtures",
                                "type": "ledger",
                                "openingDr": 150000.00,
                                "openingCr": 0,
                                "debit": 25000.00,
                                "credit": 0,
                                "closingDr": 175000.00,
                                "closingCr": 0
                            },
                            {
                                "id": "machinery",
                                "name": "Machinery",
                                "type": "ledger",
                                "openingDr": 850000.00,
                                "openingCr": 0,
                                "debit": 120000.00,
                                "credit": 0,
                                "closingDr": 970000.00,
                                "closingCr": 0
                            },
                            {
                                "id": "building",
                                "name": "Building",
                                "type": "ledger",
                                "openingDr": 1200000.00,
                                "openingCr": 0,
                                "debit": 0,
                                "credit": 0,
                                "closingDr": 1200000.00,
                                "closingCr": 0
                            },
                            {
                                "id": "land",
                                "name": "Land",
                                "type": "ledger",
                                "openingDr": 800000.00,
                                "openingCr": 0,
                                "debit": 0,
                                "credit": 0,
                                "closingDr": 800000.00,
                                "closingCr": 0
                            }
                        ]
                    }
                ]
            },
            {
                "id": "liabilities",
                "name": "Liabilities",
                "type": "group",
                "children": [
                    {
                        "id": "capital",
                        "name": "Capital Account",
                        "type": "ledger",
                        "openingDr": 0,
                        "openingCr": 2500000.00,
                        "debit": 0,
                        "credit": 0,
                        "closingDr": 0,
                        "closingCr": 2500000.00
                    },
                    {
                        "id": "current_liabilities",
                        "name": "Current Liabilities",
                        "type": "group",
                        "children": [
                            {
                                "id": "creditors",
                                "name": "Sundry Creditors",
                                "type": "ledger",
                                "openingDr": 0,
                                "openingCr": 320000.00,
                                "debit": 280000.00,
                                "credit": 450000.00,
                                "closingDr": 0,
                                "closingCr": 490000.00
                            },
                            {
                                "id": "bank_loan",
                                "name": "Bank Loan",
                                "type": "ledger",
                                "openingDr": 0,
                                "openingCr": 500000.00,
                                "debit": 50000.00,
                                "credit": 0,
                                "closingDr": 0,
                                "closingCr": 450000.00
                            }
                        ]
                    }
                ]
            },
            {
                "id": "income",
                "name": "Income",
                "type": "group",
                "children": [
                    {
                        "id": "sales",
                        "name": "Sales",
                        "type": "ledger",
                        "openingDr": 0,
                        "openingCr": 0,
                        "debit": 85000.00,
                        "credit": 1850000.00,
                        "closingDr": 0,
                        "closingCr": 1765000.00
                    },
                    {
                        "id": "other_income",
                        "name": "Other Income",
                        "type": "group",
                        "children": [
                            {
                                "id": "interest_received",
                                "name": "Interest Received",
                                "type": "ledger",
                                "openingDr": 0,
                                "openingCr": 0,
                                "debit": 0,
                                "credit": 15000.00,
                                "closingDr": 0,
                                "closingCr": 15000.00
                            }
                        ]
                    }
                ]
            },
            {
                "id": "expenses",
                "name": "Expenses",
                "type": "group",
                "children": [
                    {
                        "id": "direct_expenses",
                        "name": "Direct Expenses",
                        "type": "group",
                        "children": [
                            {
                                "id": "purchases",
                                "name": "Purchases",
                                "type": "ledger",
                                "openingDr": 0,
                                "openingCr": 0,
                                "debit": 1200000.00,
                                "credit": 45000.00,
                                "closingDr": 1155000.00,
                                "closingCr": 0
                            }
                        ]
                    },
                    {
                        "id": "indirect_expenses",
                        "name": "Indirect Expenses",
                        "type": "group",
                        "children": [
                            {
                                "id": "personnel",
                                "name": "Personnel Expenses",
                                "type": "group",
                                "children": [
                                    {
                                        "id": "salaries",
                                        "name": "Salaries",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 180000.00,
                                        "credit": 0,
                                        "closingDr": 180000.00,
                                        "closingCr": 0
                                    }
                                ]
                            },
                            {
                                "id": "office_expenses",
                                "name": "Office Expenses",
                                "type": "group",
                                "children": [
                                    {
                                        "id": "rent",
                                        "name": "Rent",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 60000.00,
                                        "credit": 0,
                                        "closingDr": 60000.00,
                                        "closingCr": 0
                                    },
                                    {
                                        "id": "electricity",
                                        "name": "Electricity",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 25000.00,
                                        "credit": 0,
                                        "closingDr": 25000.00,
                                        "closingCr": 0
                                    },
                                    {
                                        "id": "telephone",
                                        "name": "Telephone",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 12000.00,
                                        "credit": 0,
                                        "closingDr": 12000.00,
                                        "closingCr": 0
                                    },
                                    {
                                        "id": "office_misc",
                                        "name": "Office Miscellaneous",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 32000.00,
                                        "credit": 0,
                                        "closingDr": 32000.00,
                                        "closingCr": 0
                                    }
                                ]
                            },
                            {
                                "id": "administrative",
                                "name": "Administrative Expenses",
                                "type": "group",
                                "children": [
                                    {
                                        "id": "insurance",
                                        "name": "Insurance",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 18000.00,
                                        "credit": 0,
                                        "closingDr": 18000.00,
                                        "closingCr": 0
                                    },
                                    {
                                        "id": "professional_fees",
                                        "name": "Professional Fees",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 15000.00,
                                        "credit": 0,
                                        "closingDr": 15000.00,
                                        "closingCr": 0
                                    }
                                ]
                            },
                            {
                                "id": "finance_costs",
                                "name": "Finance Costs",
                                "type": "group",
                                "children": [
                                    {
                                        "id": "interest_paid",
                                        "name": "Interest Paid",
                                        "type": "ledger",
                                        "openingDr": 0,
                                        "openingCr": 0,
                                        "debit": 25000.00,
                                        "credit": 0,
                                        "closingDr": 25000.00,
                                        "closingCr": 0
                                    }
                                ]
                            },
                            {
                                "id": "depreciation",
                                "name": "Depreciation",
                                "type": "ledger",
                                "openingDr": 0,
                                "openingCr": 0,
                                "debit": 45000.00,
                                "credit": 0,
                                "closingDr": 45000.00,
                                "closingCr": 0
                            },
                            {
                                "id": "transport",
                                "name": "Transport Charges",
                                "type": "ledger",
                                "openingDr": 0,
                                "openingCr": 0,
                                "debit": 28000.00,
                                "credit": 0,
                                "closingDr": 28000.00,
                                "closingCr": 0
                            }
                        ]
                    }
                ]
            }
        ]
    }
};
