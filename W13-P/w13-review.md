## 13주차 학습 회고
### 새로 배운 내용
- 톰캣 : 윈도우에서 웹 서버와 연동하여 실행할 수 있는 자바 환경을 제공하여 자바서버 페이지(JSP)와 자바 서블릿이 실행할 수 있는 환경을 제공
- JSP(Java Server Page) : HTML 내부에 java 코드를 입력하여, 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어
- JSP 구성요소(3)
1. 템플릿 데이터 : 클라이언트로 출력되는 콘텐츠 ( HTML, JavaScript, CSS, JSON, XML, 일반 텍스트 등)
2. JSP 전용 태그 : 서블릿 생성 시 특정 자바 코드로 바뀌는 태그
- Directives (지시자) <%@ %> 지시자 속성과 값에 따라 자바 코드 생성
- Scriptlet Elements (스크립트릿) <% %>
<% 자바 코드 %>
- Declarations (선언문) <%! %>
서블릿 클래스의 멤버(변수, 메소드)를 선언할 때 사용
- Expressions (표현식) <%= %> 문자열 출력
3. JSP 내장 객체 : JSP 기술 사양 에 정의된 필수적인 9개 객체(별도 선언 없이 사용 가능)
request, response, pageContext, session, application, config, out, page, exception




### 문제가 발생하거나 고민한 내용 + 해결 과정
- 이클립스에서 오라클 연결할 때 오류가 발생했다. 구글링해서 리스너도 재실행해보고 이것 저것 해보았으나 해결이 되지않았는데 슬랙 qna를 참고해 커넥션 url의 sever를 localhost로 바꾸어주고 1521을 1522로 수정하니 정상적으로 연결되었다.

### 참고할만한 내용
- https://ssimplay.tistory.com/204 이클립스에 dynamic web project가 없어 참고


### 회고
- 삭제 기능을 추가하였다. <a href="https://youtu.be/SHeR4p6krQU">동작화면</a>
- JSP는 처음 써봐서 새로웠다. 
- 커넥션 url 수정하는 걸 계속 까먹는다...잊지말기
