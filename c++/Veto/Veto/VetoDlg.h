
// VetoDlg.h : fichier d'en-tête
//

#pragma once

class CVetoDlgAutoProxy;


// boîte de dialogue de CVetoDlg
class CVetoDlg : public CDialogEx
{
	DECLARE_DYNAMIC(CVetoDlg);
	friend class CVetoDlgAutoProxy;

// Construction
public:
	CVetoDlg(CWnd* pParent = nullptr);	// constructeur standard
	virtual ~CVetoDlg();

// Données de boîte de dialogue
#ifdef AFX_DESIGN_TIME
	enum { IDD = IDD_VETO_DIALOG };
#endif

	protected:
	virtual void DoDataExchange(CDataExchange* pDX);	// Prise en charge de DDX/DDV


// Implémentation
protected:
	CVetoDlgAutoProxy* m_pAutoProxy;
	HICON m_hIcon;

	BOOL CanExit();

	// Fonctions générées de la table des messages
	virtual BOOL OnInitDialog();
	afx_msg void OnSysCommand(UINT nID, LPARAM lParam);
	afx_msg void OnPaint();
	afx_msg HCURSOR OnQueryDragIcon();
	afx_msg void OnClose();
	virtual void OnOK();
	virtual void OnCancel();
	DECLARE_MESSAGE_MAP()
public:
	afx_msg void OnBnClickedExeweb();
	afx_msg void OnBnClickedExescan();
	afx_msg void OnBnClickedVoirfiche();
	CButton m_StopScan;
	CButton m_ExeScan;
	afx_msg void OnBnClickedStopscan();
	CButton m_VoirFiche;
	CListBox m_NumScan;
};
