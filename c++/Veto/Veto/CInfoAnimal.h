#pragma once


// boîte de dialogue de CInfoAnimal

class CInfoAnimal : public CDialogEx
{
	DECLARE_DYNAMIC(CInfoAnimal)

public:
	CInfoAnimal(CWnd* pParent = nullptr);   // constructeur standard
	virtual ~CInfoAnimal();

// Données de boîte de dialogue
#ifdef AFX_DESIGN_TIME
	enum { IDD = IDD_INFOANIMAL };
#endif

protected:
	virtual void DoDataExchange(CDataExchange* pDX);    // Prise en charge de DDX/DDV

	DECLARE_MESSAGE_MAP()
};
